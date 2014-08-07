# -*- mode: ruby -*-
# vi: set ft=ruby :

# The hostname to use
HOSTNAME = 'dev.isopress.com'

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "frozzare/isodev-web"

  # Virtualbox configuration.
  config.vm.provider :virtualbox do |v|
    v.customize ['modifyvm', :id, '--memory', 1024]
    v.customize ['modifyvm', :id, '--natdnshostresolver1', 'on']
    v.customize ['modifyvm', :id, '--natdnsproxy1', 'on']
  end

  # Adding iso.dev dashboard domain
  if defined? VagrantPlugins::HostsUpdater
      config.hostsupdater.aliases = ['iso.dev']
  end

  # Set private network ip
  config.vm.network :private_network, ip: '192.168.66.6'

  # Set hostname
  config.vm.hostname = HOSTNAME

  # Set synced folder
  config.vm.synced_folder '.', '/vagrant', :mount_options => [ 'dmode=777,fmode=777' ]
end