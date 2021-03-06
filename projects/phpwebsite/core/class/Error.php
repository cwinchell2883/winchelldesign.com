<?php
/**
 * @version $Id: Error.php 7776 2010-06-11 13:52:58Z jtickle $
 * @author Matthew McNaney <mcnaney at gmail dot com>
 */

require_once 'PEAR.php';

class PHPWS_Error {
	/**
	 * Replacement functions for PEAR's isError function. Prevents
	 * strict php 5 errors
	 */
	public static function isError($item)
	{
		$pear = PHPWS_Error::getPear();
		return $pear->isError($item);
	}

	public static function getPear()
	{
		static $pear=null;
		if (empty($pear)) {
			$pear = new PEAR;
		}
		return $pear;
	}

	/**
	 * Replacement functions for PEAR's raiseError function. Prevents
	 * strict php 5 errors
	 */
	public static function raiseError($message = null,
	$code = null,
	$mode = null,
	$options = null,
	$userinfo = null,
	$error_class = null,
	$skipmsg = false)
	{
		$pear = PHPWS_Error::getPear();
		return $pear->raiseError($message, $code, $mode, $options, $userinfo, $error_class, $skipmsg);
	}


	public static function logIfError($item)
	{
		if (PHPWS_Error::isError($item)) {
			PHPWS_Error::log($item);
			return true;
		} else {
			return false;
		}
	}

	public static function get($value, $module, $funcName=NULL, $extraInfo=NULL){
		setLanguage(DEFAULT_LANGUAGE);

		if (empty($module)) {
			return PHPWS_Error::get(PHPWS_NO_MODULE, 'core', 'PHPWS_Error::get', 'Value: ' . $value . ', Function: ' . $funcName);
		}

		$errorFile = PHPWS_Core::getConfigFile($module, 'error.php');

		if (empty($errorFile)) {
			// Error file not found in local config directory. Checking inc/ source directory
			if ($module == 'core') {
				$errorFile = PHPWS_SOURCE_DIR . 'core/inc/error.php';
			} else {
				$errorFile = PHPWS_SOURCE_DIR . 'mod/' . $module . '/inc/error.php';
			}

			if (!is_file($errorFile)) {
				// prevent infinite loop
				if ($module == 'core') {
					echo _('Core could not locate its error.php file.');
					die;
				}
				return PHPWS_Error::get(PHPWS_NO_ERROR_FILE, 'core', 'PHPWS_Error::get', 'Module: ' . $module);
			}
		}

		include $errorFile;

		if (!isset($errors))
		return FALSE;

		if (PHPWS_Error::isError($value)) {
			$value = $value->getCode();
		}

		if ($module != 'core') {
			$fullError[] = $module;
		} else {
			$fullError[] = 'Core';
		}

		if (isset($funcName)) {
			$fullError[] = " - $funcName()";
		}

		if (isset($errors[$value])) {
			$message = $errors[$value];
		} else {
			$message = _('Unknown error code.');
		}

		$fullError[] = ' - ' . $message;

		if (isset($extraInfo)){
			if (is_array($extraInfo)) {
				$message = vsprintf($message, $extraInfo);
			} else {
				$fullError[] = ' [' . $extraInfo . ']';
			}
		}

		$error = PHPWS_Error::raiseError($message, $value, NULL, NULL, implode('', $fullError));
		setLanguage(CURRENT_LANGUAGE);
		return $error;
	}

	public static function log($value, $module=NULL, $funcName=NULL, $extraInfo=NULL){
		if ((bool)PHPWS_LOG_ERRORS == FALSE) {
			return;
		}

		if (!PHPWS_Error::isError($value)) {
			$error = PHPWS_Error::get($value, $module, $funcName, $extraInfo);
		}
		else {
			$error = $value;
		}

		$final = PHPWS_Error::printError($error);

		PHPWS_Core::log($final, 'error.log', _('Error'));
	}


	public static function printError($error){
		$code  = $error->getcode();
		$message = $error->getuserinfo();

		if (!isset($message)) {
			$message = $error->getmessage();
		}

		$final = '[' . $code . '] ' . $message;

		return $final;
	}
}

?>