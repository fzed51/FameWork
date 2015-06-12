# -----------------------------------------------------
#   Clear-Project
#   =============
# @autor fzed51
# @copyright @2015
# -----------------------------------------------------

# suppression de tous les dossier de backup de notepad++
ls -Filter nppBackup -Recurse -Directory | Remove-Item -Recurse -Force
# netoyage du code, les [TAB] sont remplcés par des [ESPACE]
php ./env-work/tabToSpace.phps