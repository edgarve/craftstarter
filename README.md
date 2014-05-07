# Craft Setup

This repo is a starter for craft sites. It has a modified structure for comfy dev and optimal speed / sec in production.
Comes with Grunt, which will compile, live reload and inject styles as you develop. Get the [live reload chrome plugin](https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei) if you don't already have it.

#### Structure
- `compile` - where your Sass, CoffeeScript or JavaScript lives and is processed from
- `config` - config has been moved from core to the root level
- `core` - no longer included
- `plugins` - where any plugins you need will live
- `templates` - your templates and markup
- `www` - public folder, index.php, robots, sitemap, images, styles, and js assets

## Setup instructions

#### 0.1 Pre-install
- Clone this Repo to a folder on your system (probably somewhere apache or nginx can reach)
- `rm -rf` or `git init` in the directory of the new project to wipe out git remotes for craft starter repo
- Download Craft. Copy `craft/` to your repo as `core/`. Remove `config` `templates` etc from the core folder if you want. It isn't necessary though. It is reccomended to check the format of your config folder and make sure it matches a similar strcuture to the current version of core though.

#### 1. Setup a DB locally
- Usually with PHPMyAdmin or something
- Make sure your user has access / priv to new DB

#### 2. Update these files:

Please update both of these configs with your local info ( as well as staging and production if applicable )
- `config/db.php`
- `config/general.php`

#### 3. Install Craft

- Go to `YOUR_IP/www/admin/` and it will take you through the install.
- Make sure to append www/ or any other path info when the install asks for your site URL

#### 4. Update your install

Go to the top right of the menu bar and there should be a badge indicating updates if any exist.

#### 5. Variables

- Go to `Settings -> General Settings` and update Site URL to: `{siteUrl}`

- When adding asset sources, make sure to use both `{fileSystemPath}` and `{siteUrl}`
`Settings -> Asset Settings`

From: [Craft Docs](http://buildwithcraft.com/docs/multi-environment-configs)

## Staging Deployment

#### 1. Spin up server on digital ocean
- Spin up server from image `Craft Staging Server`
- In shell `ssh -p 11970 cosmic@SERVER_IP` (no password, just key auth)
- Update server name by running `sudo nano /etc/nginx/sites-available/default` **sudo-er password is in 1Pass**
- Once in [nano](http://mintaka.sdsu.edu/reu/nano.html) update server_name option to reflect your servers IP or domain
- `ctrl` + `x`, then `y` for yes, so that you save changes and write to file before exit, then `enter` to confirm
- Restart Nginx `sudo service nginx restart`
- After successful login, `exit` ssh

#### 2. Push to remote repo (DO server)
- In your local project `git remote add stage ssh://cosmic@SERVER_IP:11970/~/repos/site.git`
- `git remote -v` to make sure it was added correctly
- `git push stage master`
- Go to the server IP in your browser and then verify that is at least rendering a 404 **due to missing db, the next step**

#### 3. Move yo database on ova
- Check your config files `general.php` and `db.php` **server is localhost, db name is craft, user is root, mysql password is in 1Pass**
- In `general.php` your path is probably `/home/cosmic/site/www`
- Export your DB to an sql file and put it on your desktop or a path you can `cd` to
- Copy it to the server cosmic user root `scp -P 11970 ~/Desktop/DATABASE_EXPORT.sql cosmic@SERVER_IP:~`
- Log back into server `ssh -p 11970 cosmic@SERVER_IP`
- Inject database `mysql -p -u root craft < DATABASE_EXPORT.sql` **craft is the name of the already set up database on the server**
- `exit` and check the browser now :)
