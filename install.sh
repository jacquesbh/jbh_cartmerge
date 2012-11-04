#!/bin/bash
# 
# This file is part of Jbh_CartMerge for Magento.
# 
# @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
# @author Jacques Bodin-Hullin <jacques@bodin-hullin.net>
# @category Jbh
# @package Jbh_CartMerge
# @copyright Copyright (c) 2012 Jacques Bodin-Hullin (http://jacques.sh/)
# 

# Usage
function usage() {
    echo "Usage: ./install.sh [un]install [magento dir]"
    exit 1
}

# check argc
if [[ $# != 2 ]]; then
    usage
fi

# workspace
workspace=$2/app

# the module
pool=community
namespace=Jbh
module=CartMerge

# case install or uninstall
case $1 in
    install)
        # force uninstall
        $0 uninstall $2 > /dev/null
        # create dir for the namespace
        mkdir $workspace/code/$pool/$namespace 2> /dev/null
        ln -s `pwd`/app/code/$pool/${namespace}/${module} $workspace/code/$pool/${namespace}/${module}
        ln -s `pwd`/app/etc/modules/${namespace}_${module}.xml $workspace/etc/modules/${namespace}_${module}.xml
    ;;
    uninstall)
        rmdir $workspace/code/$pool/${namespace} 2> /dev/null
        rm $workspace/code/$pool/${namespace}/${module} 2> /dev/null
        rm $workspace/etc/modules/${namespace}_${module}.xml 2> /dev/null
    ;;
    *)
        usage
    ;;
esac

echo "success"
exit 0
