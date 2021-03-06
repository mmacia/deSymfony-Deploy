set :application, "deSymfony 2012 despliegue de aplicaciones"
set :domain,      "192.168.1.119" #"desymfony.debian"
set :user,        "desarrollo"
set :deploy_to,   "/home/desarrollo/deploy/stable"
set :app_path,    "app"

set :repository,  "git@bitbucket.org:mmacia/desymfony-deploy.git"
set :scm,         :git
set :scm_verbose, true
set :branch,      "master"
set :deploy_via,  :remote_cache

ssh_options[:forward_agent] = true

set :model_manager, "doctrine"
# Or: `propel`

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain                         # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where Rails migrations will run

set :use_sudo,            false
set :keep_releases,       3
set :shared_files,        ["app/config/parameters.ini"]
set :shared_children,     [app_path + "/logs", web_path + "/uploads"]
set :php_bin,             "/usr/bin/php"
set :update_vendors,      true
set :dump_assetic_assets, true
default_run_options[:pty] = true


#-----------------------------------------------------------
#                   Custom tasks
#-----------------------------------------------------------
task :parametersini do
    # make task fail if it's not the first deploy    run "[ -d #{deploy_to} ] && exit 1 || echo 'ok'"

    # create shared directories
    deploy.setup

    # parameters.ini skeleton
    default_template = <<-EOF
[parameters]

    database_driver=pdo_mysql
    database_host=localhost
    database_port=
    database_name=desymfony
    database_user=root
    database_password=

    mailer_transport=smtp
    mailer_host=localhost
    mailer_user=
    mailer_password=

    locale=en

    secret=fd368ea6db2b910684cf54722210725b77
EOF

    location = fetch(:template_dir, "app/config/") + "parameters.ini.stable"
    template = File.file?(location) ? File.read(location) : default_template

    run "mkdir -p #{shared_path}/app/config"
    put ERB.new(template).result(binding), "#{shared_path}/app/config/parameters.ini"
end
