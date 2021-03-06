﻿Write-Host $("ssh.exe -t git@github.com")
ssh.exe -T git@github.com

if ($LASTEXITCODE -ne 1){
    Write-Host $("ssh-add.exe " + $(resolve-path "~/.ssh/github_rsa"))
	ssh-add.exe $(resolve-path "~/.ssh/github_rsa")
}

if (@(Get-Command composer* -ErrorAction SilentlyContinue).count -eq 0){
	if (-not $(test-path ./composer.bat)){
	"@echo Off
	php ./env-work/composer/composer.phar %*
	" | set-content ./composer.bat
	}
	if (-not $(test-path ./env-work)){
		md env-work
	}
	if (-not $(test-path ./env-work/composer/composer.phar)){
		cd env-work
		md composer
		cd composer
		php -r "readfile('https://getcomposer.org/installer');" | php
		cd ../..
	}
	New-Alias -Name composer -Value $((Resolve-Path './composer.bat').Path)
}

.\Clear-Project.ps1
$status = $( git status --porcelain )
if( $status ){
	Write-Host "Dossier de travail modifié" -f white
	git stash
}
git pull
if( $status ){
	Write-Host "Restoration du dossier de travail" -f white
	git stash pop
}
composer selfupdate
composer update