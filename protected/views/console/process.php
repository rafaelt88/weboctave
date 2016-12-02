<?php

if( isset($_REQUEST['input']) ){

	Yii::app()->user->setState('TEXT', $_REQUEST['input']);

	function pGrafica($imag){
		return ("print('assets/temp/grafic$imag.png','-dpng')\ndisp('<div align=center><img src=../assets/temp/grafic$imag.png width=600 height=600/></div>')\n");
	}

	$imag = 0;
	$graf = false;
	$vars = array();

	exec("del -a -r -h -s /f /s /q assets/temp/*");
	$fout = fopen('assets/temp/temp.m', 'w');
	
	$block = null;
	//Filesystem Utilities
	$block .= "[copi|move|full]file|[mk|rm|confirm_recursive_rm|is|read|temp|P_tmp]dir|mkfifo|umask|[l]?stat|";
	$block .= "[re|temp|canonicalize_file_name|make_absolute_file|is_absolute_file|is_rooted_relative_file]name|";
	$block .= "[un|sym|read]?link|file[attrib|_in_path|sep|marker|parts]|glob|fnmatch|tilde_expand|";
	$block .= "[current_state|old_state] recycle|S_IS[BLK|CHR|DIR|FIFO|LNK|REG|SOCK]|";
	//Archiving Utilities
	$block .= "b[un]?zip2|[g|gun|un]?zip|[un]?tar|unpack|";
	//Networking Utilities
	$block .= "ftp|m[get|put]|ascii|binary|url[read|write]|";
	//Controlling Subprocesses
	$block .= "system|unix|dos|perl|python|popen[2]?|pclose|EXEC_PATH|fork|exec|pipe|dup2|waitpid|fcntl|kill|SIG|";
	$block .= "WCONTINUE|WCOREDUMP|WEXITSTATUS|WNOHANG|WSTOPSIG|WTERMSIG|WUNTRACED|WIF[CONTINUED|SIGNALED|STOPPED|EXITED]|";
	//Process, Group, and User IDs
	$block .= "get(pgrp|[p]?pid|[e]?uid|[e]?gid)|";
	//Environment Variables
	$block .= "(get|put|set)env|";
	//Current Working Directory
	$block .= "cd|[ch]?dir|ls[_command]?|pwd|dir|";
	// Password Database Functions
	$block .= "getpw[ent|uid|nam]|[set|end]pwent|";
	//Group Database Functions
	$block .= "(end|set)grent|get(grent|grgid|grnam)|";
	//System Information
	$block .= "computer|uname|nproc|is[pc|unix|macieee|deployed]|OCTAVE_HOME|matlabroot|octave_config_info|usejava|getrusage|";
	//Hashing Functions
	$block .= "md5sum|";
	//Paquetes
	$block .= "windows";

	fwrite($fout, 'warning ("off")'."\n");
	foreach( explode("\n",$_REQUEST['input']) as $line ){
		if ( preg_match("#($block)[ ]+[(]?#",$line) )
			$line = "disp('Por razones de seguridad, se bloque� el comando:')\ndisp('\t".$line."')";
		elseif( $graf && !preg_match("#(subplot|grid|axis|label)#",$line) ){
			$graf = false;
			fwrite($fout, pGrafica($imag++));
		}
		fwrite($fout, $line."\n");
		$graf = preg_match("#(plot|rlocus|bode|bar)#",$line)?true:$graf;
	}
	if( $graf )
		fwrite($fout, pGrafica($imag++));
	
	fclose($fout);
	$tic = microtime(true);
	Yii::app()->user->setState('OUT',shell_exec("C:\Octave\bin\octave.exe -H -f --no-line-editing -q assets/temp/temp.m 2>&1"));
	echo "<div class=art-time>Time: ".number_format(microtime(true)-$tic,3)." seg</div>";
	if ( isset(Yii::app()->user->OUT) )
		echo "<blockquote><pre>".Yii::app()->user->OUT."</pre></blockquote>";
}
?>