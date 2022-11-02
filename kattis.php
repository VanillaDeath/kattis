#!/usr/bin/php7.0.old
<?php
/**
 * open.kattis.com PHP tester and submitter script by Wilson
 *  https://stevenwilson.ca/kattis/kattis.php
 * Requires submit.py and user configuration file (.kattisrc) from
 *  https://open.kattis.com/help/submit
 * Additional PHP extensions required:
 * - BCMath for floating point comparison feature (./kattis.php test)
 * - Zip for extracting sample test files downloaded from Kattis website (./kattis.php get)
 *
 *
 * $SETTINGS *
 *
 * Global settings are defined below using the $settings array. If any of the
 * settings do not match your setup, uncomment and change the apropriate value.
 * @var array
 */
$settings = array(
    /**
     * Change below to location of your PHP command-line interface binary.
     * Also change shebang on the very first line to the same path if you want to
     * execute this script without typing "php" first (also run chmod +x kattis.php)
     */
    "php_binary" => "/usr/bin/php7.0.old",

    /**
     * Path to submission script downloaded from open.kattis.com/help/submit
     */
    // "submit_script" => "./submit.py",

    /**
     * If you need to press y<return> in the above submit script, set to true.
     */
    // "submit_requires_confirmaiton" => true,

    /**
     * Directory to copy final problem code to using the publish parameter.
     * It can be a symlink in the current directory that points to another location
     * on the system (such as a web directory). Ensure directory is writable by user
     * executing php kattis.php or ./kattis.php
     */
    // "publish_dir" => "publish",

    /**
     * Memory limit of PHP interpreter (in megabytes).
     */
    // "memory_limit" => 1024
);

/**
 * END OF SETTINGS *
 */

/**
 * Provides help for use of this command-line script.
 * @param  string $topic Name of help topic.
 * @return string        Help output.
 */
function help($topic = "summary")
{
    global $settings, $script_name;
    $return = "";
    $help_topics = array(
        "get" => "To get sample test data for a problem from kattis.com:\n$ \033[1m".$script_name."\033[0m \033[4mget\033[0m \033[4mproblem_name\033[0m\n".
        "(will create and use directory with same name as problem in current directory)",
        "test" => "To test problem_name/problem_name.php:\n$ \033[1m".$script_name."\033[0m \033[4mtest\033[0m \033[4mproblem_name\033[0m",
        "submit" => "To submit to kattis.com:\n$ \033[1m".$script_name."\033[0m \033[4msubmit\033[0m \033[4mproblem_name\033[0m",
        "publish" => "To publish to public web directory:\n$ \033[1m".$script_name."\033[0m \033[4mpublish\033[0m \033[4mproblem_name\033[0m..."
    );
    $help_footer = "\n\nHelp syntax:\n$ \033[1m".$script_name."\033[0m \033[4mhelp\033[0m [\033[4mtopic\033[0m]\n\n".
    "Valid help topics include: ";
    $i = 1;
    foreach ($help_topics as $key => $help_topic) {
        $help_footer .= "\033[4m".$key."\033[0m".($i < count($help_topics) ? ", " : "");
        $i++;
    }

    switch ($topic) {

        case "summary":
        $return .= "\033[1;36mopen.kattis.com PHP tester and submitter script\033[0m by \033[0;36mWilson\033[0m -- \033[4mhttps://stevenwilson.ca/kattis/kattis.php\033[0m\n".
        " Requires \033[4msubmit.py\033[0m and user configuration file (\033[4m.kattisrc\033[0m) from \033[4mhttps://open.kattis.com/help/submit\033[0m\n".
        "Additional PHP extensions required:\n".
        " - \033[1mBCMath\033[0m for floating point comparison feature (\033[1m".$script_name."\033[0m \033[4mtest\033[0m)\n".
        " - \033[1mZip\033[0m for extracting sample test files downloaded from Kattis website (\033[1m".$script_name."\033[0m \033[4mget\033[0m)\n\n".
        $help_topics["get"]."\n\n".
        $help_topics["test"]."\n\n".
        $help_topics["submit"]."\n\n".
        $help_topics["publish"];
        break;

        case "get":
        $return .= $help_topics["get"]."\n\n".
        "The get parameter will download the sample test files for the problem specified\n".
        "by \033[4mproblem_name\033[0m from open.kattis.com and extract them to a subdirectory here\n".
        "(\033[4mproblem_name\033[0m/). It will also prompt you to create a skeleton PHP file named\n".
        "\033[4mproblem_name\033[0m/\033[4mproblem_name\033[0m.php. Future operations done with this problem (such as\n".
        "test) will use the files in this new directory.";
        break;

        case "test":
        $return .= $help_topics["test"]."\n\n".
        "The test parameter is used when you have written a script that you want to run\n".
        "with your PHP interpreter and check the script output. As long as your script\n".
        "reads from STDIN (standard input) and writes to STDOUT (standard output) using\n".
        "fgets/fputs or fscanf/fprintf, you will be able to supply keyboard input\n".
        "directly from the shell and it will output to the screen.\n\n".
        "You may need to specify the path to your PHP binary using the\n".
        "\033[1m\$settings[\"php_binary\"]\033[0m variable in \033[1m".$script_name."\033[0m.\n".
        "Default setting: \033[1m/usr/bin/php\033[0m\n".
        "Current setting: \033[1m".$settings["php_binary"]."\033[0m\n\n".
        "If test files (*.in) are present in the problem directory, they will be detected\n".
        "and used as input for your script, one by one. For each .in file that also has\n".
        "a .ans file of the same name, this script will attempt to do a line-by-line\n".
        "check of the input file against the answer file for correctness.\n\n".
        "For more information on easily retrieving sample test files (*.in and *.ans),\n".
        "run:\n$ \033[1m".$script_name."\033[0m \033[4mhelp\033[0m \033[4mget\033[0m";
        break;

        case "submit":
        $return .= $help_topics["submit"]."\n\n".
        "The submit parameter will submit your PHP script to open.kattis.com for\n".
        "evaluation. \033[4mproblem_name\033[0m/\033[4mproblem_name\033[0m.php will be submitted through another\n".
        "script specified with the \033[1m\$settings[\"submit_script\"]\033[0m variable in \033[1m".$script_name."\033[0m\n".
        "Default setting: \033[1m./submit.py\033[0m\n".
        "Current setting: \033[1m".$settings["submit_script"]."\033[0m";
        break;

        case "publish":
        $return .= $help_topics["publish"]."\n\n".
        "The publish parameter will copy the specified problem's subdirectory from this\n".
        "directory to another directory, as specified by \033[1m\$settings[\"publish_dir\"]\033[0m in\n".
        "\033[1m".$script_name."\033[0m\n".
        "Default setting: \033[1mpublish\033[0m\n".
        "Current setting: \033[1m".$settings["publish_dir"]."\033[0m";
        break;

        default:
        $return .= "Invalid help topic supplied.";

    }
    return $return.$help_footer;
}

/**
 * Removes unwanted characters from a filename given from user input.
 * @param  string $supplied Filename supplied from input to sanitize.
 * @return string           Sanitized filename.
 */
function filesanitize($supplied)
{
    // Remove anything which isn't a word, whitespace, number
    // or any of the following caracters -_~,;[]().
    // If you don't need to handle multi-byte characters
    // you can use preg_replace rather than mb_ereg_replace
    $file = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $supplied);
    // Remove any runs of periods
    $file = mb_ereg_replace("([\.]{2,})", '', $file);
    return $file;
}

/**
 * Checks to see if a file exists and (optionally) has the necessary required extension.
 * @param  string $supplied           Supplied filename from input.
 * @param  string $required_extension (Optional) Required file extension.
 * @return string                     Return filename with proper extension if exists, else null.
 */
function filecheck($supplied, $required_extension = null)
{
    // $supplied = filesanitize(trim($supplied));
    $supplied = trim($supplied);
    $dirname = pathinfo($supplied, PATHINFO_DIRNAME);
    $fullname = pathinfo($supplied, PATHINFO_BASENAME);
    $filename = pathinfo($fullname, PATHINFO_FILENAME);
    $extension = pathinfo($fullname, PATHINFO_EXTENSION);
    if ($required_extension && strtolower($extension) !== strtolower($required_extension)) {
        $fullname = $dirname."/".$filename.".".$required_extension;
    }
    return is_file($fullname) ? $fullname : null;
}

/**
 * Compares two variables loosely, and if false, using mathematical comparison to 5 decimal places.
 * @param  mixed $a First variable to compare.
 * @param  mixed $b Second variable to compare.
 * @return int      0 if equal, -1 if less than, 1 if greater than.
 */
function compare($a, $b)
{
    return strcmp($a, $b) === 0 ? 0 : ((is_numeric($a) && is_numeric($b) && bccomp($a, $b, 5) === 0) ? 0 : ($a>$b ? 1 : -1));
}

/**
 * Checks user answers against an answer file.
 * @param  string $output          Supplied script's output.
 * @param  string $expected_output Expected output to compare against.
 * @return array                   array(bool true if all are correct, string corrected output)
 */
function answercheck($output, $expected_output)
{
    $output = explode("\n", trim($output));
    $expected_output = explode("\n", trim($expected_output));
    $return = "";
    $all_correct = true;
    foreach ($expected_output as $line_num => $line) {
        $test_line = array_key_exists($line_num, $output) ? $output[$line_num] : null;
        $correct = compare($test_line, $line);
        $pad = 35-strlen($test_line);
        $return .= $test_line.($pad > 0 ? str_repeat(" ", $pad) : "")." ".($correct === 0 ? "\033[1;32m\u{2713}\033[0m " : "\033[1;31mX\033[0m ").$line."\n";
        if ($correct !== 0 && $all_correct === true) {
            $all_correct = false;
        }
    }
    return array($all_correct, $return);
}

/**
 * Copy a file, or recursively copy a folder and its contents
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0.1
 * @link        http://aidanlister.com/2004/04/recursively-copying-directories-in-php/
 * @param       string   $source    Source path
 * @param       string   $dest      Destination path
 * @param       int      $permissions New folder creation permissions
 * @return      bool     Returns true on success, false on failure
 */
function xcopy($source, $dest, $permissions = 0755)
{
    // Check for symlinks
    if (is_link($source)) {
        return symlink(readlink($source), $dest);
    }

    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest, $permissions);
    }

    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories
        xcopy("$source/$entry", "$dest/$entry", $permissions);
    }

    // Clean up
    $dir->close();
    return true;
}

// Get name of this script:
$script_name = isset($argv) && array_key_exists(0, $argv) ? $argv[0] : $_SERVER["SCRIPT_FILENAME"];

// 1 or more parameters supplied:
$num_params = isset($argc) ? $argc - 1 : (array_key_exists("argc", $_SERVER) ? $_SERVER["argc"] - 1 : null);
if ($num_params >= 1) {
    // Get command-line data:
    $parameters = isset($argv) ? array_slice($argv, 1) : array_slice($_SERVER["argv"], 1);

    // Set defaults wherever user settings not defined:
    if (!isset($settings)) {
        $settings = array();
    }
    $settings["php_binary"] = array_key_exists("php_binary", $settings) ? $settings["php_binary"] : "/usr/bin/php";
    $settings["submit_script"] = array_key_exists("submit_script", $settings) ? $settings["submit_script"] : "./submit.py";
    $settings["submit_requires_confirmation"] = array_key_exists("submit_requires_confirmation", $settings) ? $settings["submit_requires_confirmation"] : true;
    $settings["publish_dir"] = array_key_exists("publish_dir", $settings) ? $settings["publish_dir"] : "publish";
    $settings["memory_limit"] = array_key_exists("memory_limit", $settings) ? $settings["memory_limit"] : 1024;

    switch (strtolower($parameters[0])) {

        case "test":
        // pipe input into script:
        if (array_key_exists(1, $parameters)) {
            $problem = filesanitize($parameters[1]);
            $script = filecheck($problem."/".$problem, "php");
            if ($script) {
                $test_files = glob($problem."/*.in") ?: glob($problem."/*.txt");
                if (count($test_files) == 0) {
                    $input = filecheck($problem."/".$problem, "in") ?: filecheck($problem."/".$problem, "txt");
                    $test_files = array(0 => array_key_exists(2, $parameters) ? filecheck($problem."/".$parameters[2]) : ($input ?: null));
                }
                if ($test_files[0] !== null) {
                    fprintf(STDOUT, "Testing script \033[4m".$script."\033[0m with all detected test files:\n\n");
                } else {
                    fprintf(STDOUT, "No input file, accepting input (if any) from STDIN:\n");
                }
                foreach ($test_files as $file) {
                    exec(($file ? "cat ".escapeshellarg($file)." | " : "").escapeshellcmd($settings["php_binary"])." -d memory_limit=".$settings["memory_limit"]."m ".escapeshellarg($script), $output, $return_value);
                    $output = implode("\n", $output);
                    $log_file = "./".$problem."/".pathinfo($file ? $file : $script, PATHINFO_FILENAME).".log";
                    $log = fopen($log_file, "wb");
                    if ($file) {
                        fprintf($log, "\033[4mInput file:\033[0m ".$file."\n");
                        fprintf($log, file_get_contents($file));
                    }
                    fprintf($log, "\n\033[4mScript result:\033[0m");

                    $answercheck = array();
                    $expected = filecheck($file, "ans");
                    if ($expected) {
                        fprintf($log, str_repeat(" ", 24)."\033[4mExpected result:\033[0m ".$expected."\n");
                        $expected_output = file_get_contents("./".$expected);
                        $answercheck = answercheck($output, $expected_output);
                        fprintf($log, $answercheck[1]);
                    } else {
                        fprintf($log, "\n".$output);
                    }
                    fprintf($log, "\n\033[7mReturn Value: %d\033[0m%s\n\n", $return_value, array_key_exists(0, $answercheck) ? str_repeat(" ", 21).($answercheck[0] === true ? "\033[1;32m\u{2714} CORRECT\033[0m" : "\033[1;31m\u{2718} INCORRECT\033[0m") : "");
                    fclose($log);
                    fprintf(STDOUT, file_get_contents($log_file));
                }
            } else {
                fprintf(STDERR, "Error: Script file does not exist.\n");
                break;
            }
        } else {
            fprintf(STDERR, "Error: No script supplied.\n");
        }
        break;

        case "submit":
        if (array_key_exists(1, $parameters)) {
            $problem = filesanitize($parameters[1]);
            $script = filecheck($problem."/".$problem, "php");
            if ($script) {
                if ($settings["submit_requires_confirmation"]) {
                    echo "Submit script \033[4m".$script."\033[0m to kattis? (y/\033[1mn\033[0m): ";
                    $confirm = strtolower(trim(fgets(STDIN)));
                }
                if (!$settings["submit_requires_confirmation"] || $confirm === "y" || $confirm === "yes") {
                    exec(($settings["submit_requires_confirmation"] ? "echo y | " : "").escapeshellcmd($settings["submit_script"])." ".escapeshellarg($script), $submit_output, $return_value);
                    fprintf(STDOUT, implode("\n", $submit_output));
                } else {
                    fprintf(STDOUT, "Script submission cancelled.\n");
                    break;
                }
            } else {
                fprintf(STDERR, "Error: Script file does not exist.\n");
                break;
            }
        } else {
            fprintf(STDERR, "Error: No script supplied.\n");
        }
        break;

        case "publish":
        if (array_key_exists(1, $parameters)) {
            $problem = filesanitize($parameters[1]);
            if (is_dir($problem)) {
                if (xcopy("./".$problem, $settings["publish_dir"]."/".$problem)) {
                    fprintf(STDOUT, "Published \033[4m".$problem."\033[0m to \033[4m".$settings["publish_dir"]."/".$problem."\033[0m\n");
                }
            } else {
                fprintf(STDERR, "Error: No valid problem specified.\n");
                break;
            }
        } else {
            fprintf(STDERR, "Error: No problem supplied.\n");
        }
        break;

        case "get":
        if (array_key_exists(1, $parameters)) {
            $problem = filesanitize($parameters[1]);
            mkdir($problem);

            $url = "https://open.kattis.com/problems/".$problem."/file/statement/samples.zip";
            $zipFile = "./".$problem."/samples.zip";
            $zipResource = fopen($zipFile, "w");
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FAILONERROR, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_AUTOREFERER, true);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_FILE, $zipResource);
            $page = curl_exec($ch);
            if (!$page) {
                fprintf(STDERR, "Error: ".curl_error($ch)."\n");
                curl_close($ch);
                unlink($zipFile);
                break;
            }
            curl_close($ch);
            $zip = new ZipArchive;
            if ($zip->open($zipFile) != "true") {
                fprintf(STDERR, "Error: Unable to open the Zip File\n");
                unlink($zipFile);
                break;
            }
            /* Extract Zip File */
            $zip->extractTo($problem);
            $zip->close();
            unlink($zipFile);

            $i = 0;
            foreach (glob($problem."/*.*") as $file) {
                fprintf(STDOUT, "Sample \033[4m".$file."\033[0m created.\n");
                $i++;
            }
            fprintf(STDOUT, "\033[1m".$i."\033[0m sample data file".($i != 1 ? "s" : "")." created.\n");
            $php_file = $problem."/".$problem.".php";
            if (!is_file($php_file)) {
                fprintf(STDOUT, "Would you like to create \033[4m".$php_file."\033[0m? (\033[1my\033[0m/n): ");
                $confirm = strtolower(trim(fgets(STDIN)));
                if ($confirm === "y" || $confirm === "yes" || $confirm === "") {
                    $php = fopen($php_file, "w");
                    fwrite($php, "<?php\n");
                    fclose($php);
                    fprintf(STDOUT, "\033[4m".$php_file."\033[0m created.\n");
                }
            }
        } else {
            fprintf(STDERR, "Error: Problem not specified.\n");
        }
        break;

        case "help":
        if (array_key_exists(1, $parameters)) {
            fprintf(STDOUT, help(strtolower(trim($parameters[1]))));
        } else {
            fprintf(STDOUT, help());
        }
        break;

        default:
        // No valid parameters, print help:
        fprintf(STDOUT, help());
    }
} elseif ($num_params === 0) {
    // No parameters, print help:
    fprintf(STDOUT, help());
} else {
    // $argc (argument count) global not set
    fprintf(STDERR, "Passing parameters to PHP script not supported. Are you using php-cli?\n");
}
?>
