# -*- mode: ruby -*-
# vi: set ft=ruby :

# The hostname to use
HOSTNAME = 'isopress'

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "frozzare/isodev"

  # Virtualbox configuration.
  config.vm.provider :virtualbox do |v|
    v.customize ['modifyvm', :id, '--memory', 1024]
    v.customize ['modifyvm', :id, '--natdnshostresolver1', 'on']
    v.customize ['modifyvm', :id, '--natdnsproxy1', 'on']
  end

  # Adding iso.dev dashboard domain
  if defined? VagrantPlugins::HostsUpdater
      config.hostsupdater.aliases = ['dev.isopress.com', 'iso.dev']
  end

  # Set private network ip
  config.vm.network :private_network, ip: '192.168.66.6'

  # Forward Mariadb port
  config.vm.network "forwarded_port", guest: 3306, host: 33060

  # Set hostname
  config.vm.hostname = HOSTNAME

  # For using vassh this is required even if it's not necessary to have this since isodev already does this.
  config.vm.synced_folder '.', '/vagrant', :nfs => { :mount_options => ['dmode=777','fmode=777','vers=3', 'tcp'] }
end
