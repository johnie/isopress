# -*- coding: utf-8 -*-
# Isopress deployment

from fabric.api import run, sudo, require, env, cd
from fabric.contrib.files import exists

# Production configuration
def production():
  env.hosts  = ['']
  env.target = '~/isopress'
  env.repo   = 'git@github.com:frozzare/isopress.git'
  env.branch = 'master'

# Staging configuration
def staging():
  env.hosts  = ['']
  env.target = '~/isopress'
  env.repo   = 'git@github.com:frozzare/isopress.git'
  env.branch = 'develop'

# Setup directories
def _setup_dirs(env):
  if not exists(env.target):
    run('mkdir -p %(target)s' % env)

# Clone repository
def _clone_repo(env):
  if not exists(env.target + '/.git'):
    run('git clone %(repo)s %(target)s' % env)

# Update repository
def _update_repo(env):
  if exists(env.target + '/.git'):
    with cd('%(target)s' % env):
      run('git pull origin %(branch)s' % env)

# Deploy to server
def deploy():
  require('hosts', provided_by=[production, staging])
  require('target', provided_by=[production, staging])

  _setup_dirs(env)
  _clone_repo(env)
  _update_repo(env)

  print('\033[0;32mDeployment done!\033[0m')

# Restart services
def restart():
  require('hosts', provided_by=[production, staging])
  sudo('service nginx restart')