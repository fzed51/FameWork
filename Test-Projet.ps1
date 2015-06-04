ls *.php -File -Recurse | % { 
	$log = &"php"  @('-l', $_.fullName) 2>$Null
	$testOk = $?
	$path = Resolve-Path -Relative $_.FullName
	if ($testOk) { 
		Write-Host $path -no
		Write-Host " syntax OK"-ForegroundColor green 
	}else{ 
		Write-Host $path -no
		Write-Host " syntax error"-ForegroundColor red  -no
		$log
	}
}
