#!/usr/bin/php7.0.old
<?php
// TO-DO: handle each problem in its own directory
// $argc = $_SERVER["argc"]; $argv = $_SERVER["argv"];
$php_binary = "/usr/bin/php7.0.old";
$submit_script = "./submit.py";
$submit_requires_confirmation = true;
$publish_dir = "publish";
$temporary_dir = "tmp";

function help ($article = 0) {
	global $argv, $temporary_dir;
	$script_name = $argv[0];
	switch ($article) {
		default:
		return "\033[1;36mopen.kattis.com PHP tester and submitter script\033[0m by \033[0;36mWilson\033[0m -- \033[4mhttps://stevenwilson.ca/kattis/kattis.php\033[0m\n Requires \033[4msubmit.py\033[0m and user configuration file (\033[4m.kattisrc\033[0m) from \033[4mhttps://open.kattis.com/help/submit\033[0m\n\nTo test, script_name.txt supplied to script_name.php:\n$ \033[1m".$script_name."\033[0m \033[4mtest\033[0m \033[4mscript_name\033[0m\n\nTo test, input_data_name.txt supplied to script_name.php:\n$ \033[1m".
		$script_name."\033[0m \033[4mtest\033[0m \033[4mscript_name\033[0m \033[4minput_data_name\033[0m\n\nTo test, if input data file extension not txt:\n$ \033[1m".
		$script_name."\033[0m \033[4mtest\033[0m \033[4mscript_name\033[0m \033[4minput_data_name.ext\033[0m\n(will automatically be checked against \033[4minput_data_name.ans\033[0m if it exists).\n\nTo submit to kattis.com:\n$ \033[1m".
		$script_name."\033[0m \033[4msubmit\033[0m \033[4mscript_name\033[0m\n\nTo publish to public web directory:\n$ \033[1m".
		$script_name."\033[0m \033[4mpublish\033[0m \033[4mfile_specification\033[0m...\n\nTo get sample test data for a problem from kattis.com:\n$ \033[1m".
		$script_name."\033[0m \033[4mget\033[0m \033[4mproblem_name\033[0m\n(will create and use temporary directory \033[4m".$temporary_dir."/\033[0m in current directory)\n";
	}
}
function filesanitize ($supplied) {
	// Remove anything which isn't a word, whitespace, number
	// or any of the following caracters -_~,;[]().
	// If you don't need to handle multi-byte characters
	// you can use preg_replace rather than mb_ereg_replace
	$file = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $supplied);
	// Remove any runs of periods
	$file = mb_ereg_replace("([\.]{2,})", '', $file);
	return $file;
}
function filecheck ($supplied, $required_extension = null) {
	$fullname = pathinfo(filesanitize(trim($supplied)), PATHINFO_BASENAME);
	$filename = pathinfo($fullname, PATHINFO_FILENAME);
	$extension = pathinfo($fullname, PATHINFO_EXTENSION);
	if ($required_extension && strtolower($extension) !== $required_extension) {
		$fullname = $filename.".".$required_extension;
	}
	return is_file($fullname) ? $fullname : null;
}
function compare ($a, $b) {
	return $a==$b || (is_numeric($a) && is_numeric($b) && bccomp($a, $b, 5) === 0) ? 0 : ($a>$b ? 1 : -1);
}
function answercheck ($output, $expected_output) {
	$output = explode("\n", trim($output));
	$expected_output = explode("\n", trim($expected_output));
	// return $output == $expected_output || count(array_udiff_assoc(explode("\n", $output), explode("\n", $expected_output), "compare")) === 0;
	$return = "";
	$all_correct = true;
	foreach ($output as $line_num => $line) {
		$exp_line = $expected_output[$line_num];
		$correct = compare($line, $exp_line);
		$return .= $line.str_repeat(" ", 35-strlen($line))." ".($correct === 0 ? "\033[1;32m\u{2713}\033[0m " : "\033[1;31mX\033[0m ").$expected_output[$line_num]."\n";
		if ($correct !== 0 && $all_correct === true) {
			$all_correct = false;
		}
	}
	return array($all_correct, $return);
}

if (isset($argc) && $argc > 1) {
	// 1 or more parameters:
	switch (strtolower($argv[1])) {

		case "test":
		// pipe input into script:
		if (array_key_exists(2, $argv)) {
			$problem = filesanitize($argv[2]);
			$script = filecheck($problem."/".$problem, "php");
			if ($script) {
				$testfile = array_key_exists(3, $argv) ? filecheck($problem."/".$argv[3]) : filecheck($argv[2], "txt");
				if (!$testfile) {
					fprintf(STDOUT, "No input file, accepting input (if any) from STDIN:\n");
				}
				exec(($testfile ? "cat ".escapeshellarg($testfile)." | " : "").escapeshellcmd($php_binary)." ".escapeshellarg($script), $output, $return_value);
				$output = implode("\n", $output);
				$log_file = "./".$problem."/".pathinfo($testfile ? $testfile : $script, PATHINFO_FILENAME).".log";
				$log = fopen($log_file, "wb");
				fprintf($log, "\033[4mInput file:\033[0m ".$testfile."\n");
				fprintf($log, file_get_contents($testfile)."\n");
				fprintf($log, "\033[4mScript result:\033[0m ".$script);

				$answercheck = array();
				if (array_key_exists(3, $argv)) {
					$expected = filecheck($problem."/".$argv[3], "ans");
					if ($expected) {
						fprintf($log, str_repeat(" ", 23-strlen($script))."\033[4mExpected result:\033[0m ".$expected."\n");
						$expected_output = file_get_contents("./".$expected);
						$answercheck = answercheck($output, $expected_output);
						fprintf($log, $answercheck[1]);
						// fprintf($log, $expected_output."\n".(answercheck($output, $expected_output) ? "-- \033[1;32mCORRECT\033[0m --" : "- \033[1;31mINCORRECT\033[0m -")."\n");
					}
				} else {
					fprintf($log, "\n".$output);
				}
				fprintf($log, "\n\033[7mReturn Value: %d\033[0m%s\n", $return_value, array_key_exists(0, $answercheck) ? str_repeat(" ", 21).($answercheck[0] === true ? "\033[1;32m\u{2714} CORRECT\033[0m" : "\033[1;31m\u{2718} INCORRECT\033[0m") : "");
				fclose($log);
				fprintf(STDOUT, file_get_contents($log_file));
			} else {
				fprintf(STDERR, "Error: Script file does not exist.\n");
				break;
			}
		} else {
			fprintf(STDERR, "Error: No script supplied.\n");
		}
		break;

		case "submit":
		if (array_key_exists(2, $argv)) {
			$script = filecheck($argv[2], "php");
			if ($script) {
				if ($submit_requires_confirmation) {
					echo "Submit script \033[4m".$script."\033[0m to kattis? (y/\033[1mn\033[0m): ";
					$confirm = strtolower(trim(fgets(STDIN)));
				}
				if (!$submit_requires_confirmation || $confirm === "y" || $confirm === "yes") {
					exec(($submit_requires_confirmation ? "echo y | " : "").escapeshellcmd($submit_script)." ".escapeshellarg($script), $submit_output, $return_value);
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
		if (array_key_exists(2, $argv)) {
			$i = 2;
			$files = array();
			while ($i < $argc) {
				$file = filecheck($argv[$i]);
				if ($file) {
					$files[] = $file;
				}
				$i++;
			}
			if (count($files) > 0) {
				// $last_line = system("cp -vi ".implode(" ", $files)." ".escapeshellarg($publish_dir)."/", $return_value);
				$i = 0;
				foreach ($files as $file) {
					if (copy("./".$file, $publish_dir."/".$file)) {
						fprintf(STDOUT, "Published \033[4m".$file."\033[0m to \033[4m".$publish_dir."/".$file."\033[0m\n");
						$i++;
					}
				}
				fprintf(STDOUT, "Published \033[1m".$i."\033[0m file".($i != 1 ? "s" : "").".\n");
			} else {
				fprintf(STDERR, "Error: No valid files specified.\n");
				break;
			}
		} else {
			fprintf(STDERR, "Error: No files supplied.\n");
		}
		break;

		case "get":
		if (array_key_exists(2, $argv)) {
			$problem = filesanitize($argv[2]);
			$url = "https://open.kattis.com/problems/".$problem."/file/statement/samples.zip";
			$tmpFile = $temporary_dir."/samples_".$problem.".zip";
			$zipResource = fopen($tmpFile, "w");
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_FAILONERROR, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_AUTOREFERER, true);
			curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_FILE, $zipResource);
			$page = curl_exec($ch);
			if(!$page) {
			 fprintf(STDERR, "Error: ".curl_error($ch)."\n");
			 curl_close($ch);
			 unlink($tmpFile);
			 break;
			}
			curl_close($ch);

			$zip = new ZipArchive;
			$extractPath = $temporary_dir."/samples_".$problem;
			if($zip->open($tmpFile) != "true"){
			 fprintf(STDERR, "Error: Unable to open the Zip File\n");
			 unlink($tmpFile);
			}
			/* Extract Zip File */
			$zip->extractTo($extractPath);
			$zip->close();
			unlink($tmpFile);
			$i = 0;
			foreach(glob($temporary_dir."/samples_".$problem."/*.*") as $file) {
				$dest = (substr(pathinfo($file, PATHINFO_FILENAME), 0, strlen($problem)) != $problem ? $problem : "").(pathinfo($file, PATHINFO_BASENAME));
				if (rename($file, "./".$dest)) {
					fprintf(STDOUT, "Sample \033[4m".$dest."\033[0m created.\n");
					$i++;
				}
			}
			fprintf(STDOUT, "\033[1m".$i."\033[0m sample data file".($i != 1 ? "s" : "")." created.\n");
			rmdir($temporary_dir."/samples_".$problem);
			if (!is_file("./".$problem.".php")) {
				fprintf(STDOUT, "Would you like to create \033[4m".$problem.".php\033[0m? (y/\033[1mn\033[0m): ");
				$confirm = strtolower(trim(fgets(STDIN)));
				if ($confirm === "y" || $confirm === "yes") {
					$php = fopen("./".$problem.".php", "w");
					fwrite($php, "<?php\n\n?>\n");
					fclose($php);
					fprintf(STDOUT, "\033[4m".$problem.".php\033[0m created.\n");
				}
			}
		} else {
			fprintf(STDERR, "Error: Problem not specified.\n");
		}
		break;

		default:
		// No valid parameters, print help:
		fprintf(STDOUT, help());
	}
} elseif (isset($argc) && $argc == 1) {
	// No parameters, print help:
	fprintf(STDOUT, help());
} else {
	fprintf(STDERR, "Passing parameters to PHP script not supported. Are you using php-cli?\n");
}
?>
