<?php

date_default_timezone_set('America/Chicago');

class Deploy {
    
    /**
     * A little security using the web hook secret.
     */
    private $secret;
    private $remote;
    private $gitDir;
    private $data;
    private $event;
    private $delivery;
    private $gitOutput;
    private $gitExitCode;

    /**
     * The name of the file that will be used for logging deployments. Set to 
     * FALSE to disable logging.
     * 
     * @var string
     */
    private $_log = 'deployments.log';

    /**
     * The timestamp format used for logging.
     * 
     * @link    http://www.php.net/manual/en/function.date.php
     * @var     string
     */
    private $_date_format = 'Y-m-d H:i:sP';

    /**
     * The name of the branch to pull from.
     * 
     * @var string
     */
    private $_branch = 'master';

    /**
     * The name of the remote to pull from.
     * 
     * @var string
     */
    private $_remote = 'origin';

    /**
     * The directory where your website and git repository are located, can be 
     * a relative or absolute path
     * 
     * @var string
     */
    private $_directory;

    /**
     * A callback function to call after the deploy has finished.
     * 
     * @var callback
     */
    public $post_deploy;

    /**
     * Sets up defaults.
     * 
     * @param  string  $directory  Directory where your website is located
     * @param  array   $data       Information about the deployment
     */
    public function __construct($directory, $options = array())
    {
        // Determine the directory path
        $this->_directory = realpath($directory).DIRECTORY_SEPARATOR;

        $available_options = array('log', 'date_format', 'branch', 'remote', 'secret');

        foreach ($options as $option => $value)
        {
            if (in_array($option, $available_options))
            {
                $this->{'_'.$option} = $value;
            }
        }

        $this->log('Attempting deployment...');
    }

    /**
     * Writes a message to the log file.
     * 
     * @param  string  $message  The message to write
     * @param  string  $type     The type of log message (e.g. INFO, DEBUG, ERROR, etc.)
     */
    public function log($message, $type = 'INFO')
    {
        if ($this->_log)
        {
            // Set the name of the log file
            $filename = $this->_log;

            if ( ! file_exists($filename))
            {
                // Create the log file
                file_put_contents($filename, '');

                // Allow anyone to write to log files
                chmod($filename, 0666);
            }

            // Write the message into the log file
            // Format: time --- type: message
            file_put_contents($filename, date($this->_date_format).' --- '.$type.': '.$message.PHP_EOL, FILE_APPEND);
        }
    }

    /**
     * Executes the necessary commands to deploy the website.
     */
    public function execute()
    {
        if (!$this->validate())
        {
            return false;
        }
        try
        {
            // Make sure we're in the right directory
            chdir($this->_directory);
            $this->log('Changing working directory... ');

            // Discard any changes to tracked files since our last deploy
            exec('git reset --hard HEAD', $output);
            $this->log('Reseting repository... '.implode(' ', $output));

            // Update the local repository
            exec('git pull '.$this->_remote.' '.$this->_branch, $output);
            $this->log('Pulling in changes... '.implode(' ', $output));

            // Secure the .git directory
            exec('chmod -R og-rx .git');
            $this->log('Securing .git directory... ');

            if (is_callable($this->post_deploy))
            {
                call_user_func($this->post_deploy, $this->_data);
            }

            $this->log('Deployment successful.');
        }
        catch (Exception $e)
        {
            $this->log($e, 'ERROR');
        }
    }
    
    /**
     * Validates the secret.
     */
    public function getData()
    {
        return $this->data;
    }
    public function getDelivery()
    {
        return $this->delivery;
    }
    public function getEvent()
    {
        return $this->event;
    }
    public function getGitDir()
    {
        return $this->gitDir;
    }
    public function getGitOutput()
    {
        return $this->gitOutput;
    }
    public function getRemote()
    {
        return $this->remote;
    }
    public function getSecret()
    {
        return $this->secret;
    }
    public function getGitExitCode()
    {
        return $this->gitExitCode;
    }
    public function validate()
    {
        $signature = @$_SERVER['HTTP_X_HUB_SIGNATURE'];
        $event = @$_SERVER['HTTP_X_GITHUB_EVENT'];
        $delivery = @$_SERVER['HTTP_X_GITHUB_DELIVERY'];
        $payload = file_get_contents('php://input');
        if (!isset($signature, $event, $delivery))
        {
            return false;
        }
        if (!$this->validateSignature($signature, $payload))
        {
            return false;
        }
        $this->data = json_decode($payload,true);
        $this->event = $event;
        $this->delivery = $delivery;
        
        return true;
    }
    protected function validateSignature($gitHubSignatureHeader, $payload)
    {
        list ($algo, $gitHubSignature) = explode("=", $gitHubSignatureHeader);
        if ($algo !== 'sha1') {
            // see https://developer.github.com/webhooks/securing/
            return false;
        }
        $payloadHash = hash_hmac($algo, $payload, $this->_secret);
        return ($payloadHash === $gitHubSignature);
    }

}

// This is just an example
$options = array(
    'log' => 'cfe9ef66e171c419a4c84a7da78c278c.log',
    'date_format' => 'Y-m-d H:i:sP',
    'branch' => 'master',
    'remote' => 'origin',
    'secret' => 'b27d1b9c731aa6a996f3c7cf5266841e5f19377f'
);
$deploy = new Deploy('/home/cwinchell/winchelldesign.com', $options);


/**
 * $deploy->post_deploy = function() use ($deploy) {
 *      // hit the wp-admin page to update any db changes
 *      exec('curl http://www.foobar.com/wp-admin/upgrade.php?step=upgrade_db');
 *      $deploy->log('Updating wordpress database... ');
 * };
 */

$deploy->execute();

?>