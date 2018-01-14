<?php

use App\{
    Permission, Role
};
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Doc block:
        // Roles
        /**
         * name — Unique name for the Role, used for looking up role information in the application layer.
         *              For example: "admin", "owner", "employee".
         * display_name — Human readable name for the Role. Not necessarily unique and optional.
         *              For example: "User Administrator", "Project Owner", "Widget Co. Employee".
         * description — A more detailed explanation of what the Role does. Also optional.
         */
        // Permissions
        /**
         * name — Unique name for the permission, used for looking up permission information in the application layer.
         *              For example: "create-post", "edit-user", "post-payment", "mailing-list-subscribe".
         * display_name — Human readable name for the permission. Not necessarily unique and optional.
         *              For example "Create Posts", "Edit Users", "Post Payments", "Subscribe to mailing list".
         * description — A more detailed explanation of the Permission.
         */
        // End doc block.


        // Super Administrator
        $super_admin = new Role();
        $super_admin->name = 'super_admin';
        $super_admin->display_name = 'Super Administrator';
        $super_admin->description = 'User is the master owner of the system';
        $super_admin->save();

        $manageSystem = new Permission();
        $manageSystem->name = 'manage-system';
        $manageSystem->display_name = 'Manage system';
        // Allow a user to...
        $manageSystem->description = 'manage the entire system';
        $manageSystem->save();

        // Backup Administrator
        $backup_admin = new Role();
        $backup_admin->name = 'backup_admin';
        $backup_admin->display_name = 'Backup Administrator';
        $backup_admin->description = 'User manages tape, NAS, DAS, & storage server storage';
        $backup_admin->save();

        // Billing Manager
        $billing_manager = new Role();
        $billing_manager->name = 'billing_manager';
        $billing_manager->display_name = 'Billing Manager';
        $billing_manager->description = 'User manages (A.R.) Accounts Receivables';
        $billing_manager->save();

        // Billing Representative
        $billing_rep = new Role();
        $billing_rep->name = 'billing_rep';
        $billing_rep->display_name = 'Billing Representative';
        $billing_rep->description = 'User coordinate billing functions & issues invoices, handles payments, & updates financial records';
        $billing_rep->save();

        // CDN Administrator
        $cdn_admin = new Role();
        $cdn_admin->name = 'cdn_admin';
        $cdn_admin->display_name = 'CDN Administrator';
        $cdn_admin->description = 'User manages the content delivery network';
        $cdn_admin->save();

        // Database Administrator
        $db_admin = new Role();
        $db_admin->name = 'db_admin';
        $db_admin->display_name = 'Database Administrator';
        $db_admin->description = 'User manages ongoing maintenance of production databases; plans, designs, & develops new database applications, or major changes to existing applications; & manages the organization\'s data & metadata';
        $db_admin->save();

        // Forum Administrator
        $forum_admin = new Role();
        $forum_admin->name = 'forum_admin';
        $forum_admin->display_name = 'Forum Administrator';
        $forum_admin->description = 'User manages community forum leaders on the forums';
        $forum_admin->save();

        // Forum Community Leader
        $forum_community_leader = new Role();
        $forum_community_leader->name = 'forum_community_leader';
        $forum_community_leader->display_name = 'Forum Community Leader';
        $forum_community_leader->description = 'User manages the users on the forums ensuring that they follow the AUP of the forum';
        $forum_community_leader->save();

        // Hardware Manager
        $hardware_manager = new Role();
        $hardware_manager->name = 'hardware_manager';
        $hardware_manager->display_name = 'Hardware Manager';
        $hardware_manager->description = 'User manages hardware representatives, orders hardware, & audits hardware';
        $hardware_manager->save();

        // Hardware Representative
        $hardware_rep = new Role();
        $hardware_rep->name = 'hardware_rep';
        $hardware_rep->display_name = 'Hardware Representative';
        $hardware_rep->description = 'User manages deployment of hardware & performs hardware audits of assets';
        $hardware_rep->save();

        // Infrastructure Manager
        $infrastructure_manager = new Role();
        $infrastructure_manager->name = 'infrastructure_manager';
        $infrastructure_manager->display_name = 'Infrastructure Manager';
        $infrastructure_manager->description = 'User designs, installs, maintains, and retires the systems that are at the core of the organization';
        $infrastructure_manager->save();

        // Infrastructure Representative
        $infrastructure_rep = new Role();
        $infrastructure_rep->name = 'infrastructure_rep';
        $infrastructure_rep->display_name = 'Infrastructure Representative';
        $infrastructure_rep->description = '';
        $infrastructure_rep->save();

        // Marketing Manager
        $marketing_manager = new Role();
        $marketing_manager->name = 'marketing_manager';
        $marketing_manager->display_name = 'Marketing Manager';
        $marketing_manager->description = 'User manages the marketing of the business and business\' products';
        $marketing_manager->save();

        // Marketing Representative
        $marketing_rep = new Role();
        $marketing_rep->name = 'marketing_rep';
        $marketing_rep->display_name = 'Marketing Representative';
        $marketing_rep->description = 'User promotes products & services offered by the organization';
        $marketing_rep->save();

        // Network Administrator
        $network_admin = new Role();
        $network_admin->name = 'network_admin';
        $network_admin->display_name = 'Network Administrator';
        $network_admin->description = 'User keeps an organization\'s computer network up to date & running smoothly';
        $network_admin->save();

        // Provisioning Specialist
        $provisioning_specialist = new Role();
        $provisioning_specialist->name = 'provisioning_specialist';
        $provisioning_specialist->display_name = 'Provisioning Specialist';
        $provisioning_specialist->description = 'User manages the internal provision system & ';
        $provisioning_specialist->save();

        // Sales Manager
        $sales_manager = new Role();
        $sales_manager->name = 'sales_manager';
        $sales_manager->display_name = 'Sales Manager';
        $sales_manager->description = 'User manages sales representatives & is responsible for achieving the sales targets for the organization';
        $sales_manager->save();

        // Sales Representative
        $sales_rep = new Role();
        $sales_rep->name = 'sales_rep';
        $sales_rep->display_name = 'Sales Representative';
        $sales_rep->description = 'User sells products, goods, & services to customers';
        $sales_rep->save();

        // Storage Administrator
        $storage_admin = new Role();
        $storage_admin->name = 'storage_admin';
        $storage_admin->display_name = 'Storage Administrator';
        $storage_admin->description = 'User installs, configures, & maintain inclusive storage hardware backups';
        $storage_admin->save();

        // Datacenter Manager
        $datacenter_manager = new Role();
        $datacenter_manager->name = 'datacenter_manager';
        $datacenter_manager->display_name = 'Datacenter Manager';
        $datacenter_manager->description = 'User organizes & maintains the company\'s digital information management operations';
        $datacenter_manager->save();

        // Senior Systems Administrator
        $srsysadmin_support = new Role();
        $srsysadmin_support->name = 'srsysadmin_support';
        $srsysadmin_support->display_name = 'Support Representative -  Senior System Administrator';
        $srsysadmin_support->description = 'User is a senior system administrator';
        $srsysadmin_support->save();

        // Level 2 Support Representative
        $lvl2_support = new Role();
        $lvl2_support->name = 'lvl2_support';
        $lvl2_support->display_name = 'Support Representative - Level 2';
        $lvl2_support->description = 'User is a junior system administrator';
        $lvl2_support->save();

        // Level 1 Support Representative
        $lvl1_support = new Role();
        $lvl1_support->name = 'lvl1_support';
        $lvl1_support->display_name = 'Support Representative - Level 1';
        $lvl1_support->description = 'User is a novice system administrator';
        $lvl1_support->save();

        // Employee
        $employee = new Role();
        $employee->name = 'employee';
        $employee->display_name = 'Employee';
        $employee->description = 'Default employee role';
        $employee->save();


        /** Add Role/Permission to Admin user */
        $user = App\User::first();
        $super_admin = Role::where('name', 'super_admin')->first();
        $manageSystem = Permission::where('name', 'manage-system')->first();
        // User->Role
        $user->attachRole($super_admin);
        // Permission->Role
        $super_admin->attachPermission($manageSystem);
    }
}
