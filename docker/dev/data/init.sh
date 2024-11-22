workdir="/var/www/devcanvas/"

if ! [[ -d "$workdir" ]]; then
    echo "Cloning..."
    git clone git@github.com:sudharshanr15/devcanvas.git "$workdir"
fi
