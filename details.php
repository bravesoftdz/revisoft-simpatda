<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Module_Simpatda extends Module {

    public $version = '1.0';

    public function info() {
        return array(
            'name' => array(
                'en' => 'Simpatda System'
            ),
            'description' => array(
                'en' => 'Simpatda is a tool created for the purpose of assisting users in making data collection or determination of taxes and levies.'
            ),
            'frontend' => TRUE,
            'backend' => TRUE,
            'menu' => 'content'
        );
    }

    public function install() {
		$this->dbforge->drop_table('simp_usergroup');
		$this->dbforge->drop_table('simp_jenis');
		$this->dbforge->drop_table('simp_organisasi');
		$this->dbforge->drop_table('simp_pegawai');
		$this->dbforge->drop_table('simp_rekening');
    $this->dbforge->drop_table('simp_reklame');
		$this->dbforge->drop_table('simp_rms_reklame');
		$this->dbforge->drop_table('simp_system');
		$this->dbforge->drop_table('simp_user');
		$this->dbforge->drop_table('simp_user_organisasi');
		$this->dbforge->drop_table('simp_wilayah');
    $this->dbforge->drop_table('simp_info_kontrak');
    $this->dbforge->drop_table('simp_no_daftar');
    $this->dbforge->drop_table('simp_pendaftaran');
    $this->dbforge->drop_table('simp_pendataan');
    $this->dbforge->drop_table('simp_pendataan_reklame');
    $this->dbforge->drop_table('simp_penetapan');
    $this->dbforge->drop_table('simp_penetapan_reklame');
    $this->dbforge->drop_table('simp_wajib_pajak');
    $this->dbforge->drop_table('simp_wajib_pajak_izin');
    $this->dbforge->drop_table('simp_wajib_pajak_kewajiban');
		
        
                

        $gpsi_clients = "CREATE TABLE IF NOT EXISTS " . $this->db->dbprefix('gpsi_clients') . " (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

        $gpsi_contractors = "CREATE TABLE IF NOT EXISTS  " . $this->db->dbprefix('gpsi_contractors') ." (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $gpsi_contracts = "CREATE TABLE IF NOT EXISTS " . $this->db->dbprefix('gpsi_contracts') ." (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_paydate` datetime DEFAULT NULL,
  `end_paydate` datetime DEFAULT NULL,
  `start_contract` datetime DEFAULT NULL,
  `end_contract` datetime DEFAULT NULL,
  `contractor_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `term_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contractor_contract` (`contractor_id`),
  KEY `fk_suppliers_contract` (`supplier_id`),
  KEY `fk_clients_contract` (`client_id`),
  KEY `fk_terms_contract` (`term_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $gpsi_events = "CREATE TABLE IF NOT EXISTS " . $this->db->dbprefix('gpsi_events') ." (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $gpsi_expenses = "CREATE TABLE IF NOT EXISTS " . $this->db->dbprefix('gpsi_expenses') ." (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `receipt_url` varchar(45) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `contractor_id` int(11) DEFAULT NULL,
  `type_expense_id` int(11) DEFAULT NULL,
  `type_currency_id` int(11) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contractor` (`contractor_id`),
  KEY `fk_type_expense` (`type_expense_id`),
  KEY `fk_type_currency_expenses` (`type_currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";
        
        $gpsi_reports = "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('gpsi_reports') ." (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `contractor_id` int(11) DEFAULT NULL,
  `type_hour_id` int(11) DEFAULT NULL,
  `contract_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contractor_report` (`contractor_id`),
  KEY `fk_event_report` (`event_id`),
  KEY `fk_type_hour_report` (`type_hour_id`),
  KEY `fk_contracts_reports` (`contract_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $gpsi_suppliers = "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('gpsi_suppliers') ." (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $gpsi_terms = "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('gpsi_terms') ." (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_UNIQUE` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $gpsi_typecurrency = "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('gpsi_typecurrency') ." (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `symbol` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $gpsi_typeexpenses = "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('gpsi_typeexpenses') ." (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
        
        $gpsi_typehours = "CREATE TABLE IF NOT EXISTS ". $this->db->dbprefix('gpsi_typehours') ." (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";

$gpsi_alter_contracts = "ALTER TABLE ". $this->db->dbprefix('gpsi_contracts') ."
  ADD CONSTRAINT `fk_contractor_contract` FOREIGN KEY (`contractor_id`) REFERENCES ". $this->db->dbprefix('gpsi_contractors') ." (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_suppliers_contract` FOREIGN KEY (`supplier_id`) REFERENCES ". $this->db->dbprefix('gpsi_suppliers') ." (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clients_contract` FOREIGN KEY (`client_id`) REFERENCES ". $this->db->dbprefix('gpsi_clients') ." (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_terms_contract` FOREIGN KEY (`term_id`) REFERENCES ". $this->db->dbprefix('gpsi_terms') ." (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION";

        $gpsi_alter_expenses = "ALTER TABLE ". $this->db->dbprefix('gpsi_expenses') ."
  ADD CONSTRAINT `fk_contractor_expenses` FOREIGN KEY (`contractor_id`) REFERENCES ". $this->db->dbprefix('gpsi_contractors') ." (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_type_expense_expenses` FOREIGN KEY (`type_expense_id`) REFERENCES ". $this->db->dbprefix('gpsi_typeexpenses') ." (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_type_currency_expenses` FOREIGN KEY (`type_currency_id`) REFERENCES ". $this->db->dbprefix('gpsi_typecurrency') ." (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
		";
        
        $gpsi_alter_reports = "ALTER TABLE ". $this->db->dbprefix('gpsi_reports') ."
ADD CONSTRAINT `fk_contracts_reports` FOREIGN KEY (`contract_id`) REFERENCES ". $this->db->dbprefix('gpsi_contracts') ." (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,  
ADD CONSTRAINT `fk_contractor_reports` FOREIGN KEY (`contractor_id`) REFERENCES ". $this->db->dbprefix('gpsi_contractors') ." (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_event_reports` FOREIGN KEY (`event_id`) REFERENCES ". $this->db->dbprefix('gpsi_events') ." (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_type_hour_reports` FOREIGN KEY (`type_hour_id`) REFERENCES ". $this->db->dbprefix('gpsi_typehours') ." (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
            
            ";

        if ($this->db->query($gpsi_clients) && 
            $this->db->query($gpsi_contractors) &&
            $this->db->query($gpsi_contracts) &&
            $this->db->query($gpsi_events) &&
            $this->db->query($gpsi_expenses) &&
            $this->db->query($gpsi_reports) &&
            $this->db->query($gpsi_suppliers) &&
            $this->db->query($gpsi_terms) &&
            $this->db->query($gpsi_typecurrency) &&
            $this->db->query($gpsi_typeexpenses) &&
            $this->db->query($gpsi_typehours) &&    
            $this->db->query($gpsi_alter_expenses) &&
            $this->db->query($gpsi_alter_reports) &&
                $this->db->query($gpsi_alter_contracts)
                ) {
            return TRUE;
        }
    }

    public function uninstall() {
        return FALSE; //Not interested in uninstalling this for the time being.
    }

    public function upgrade($old_version) {
        // Your Upgrade Logic
        return TRUE;
    }

    public function help() {
        // Return a string containing help info
        // You could include a file and return it here.
        return "<h4>Overview</h4>
		<p>The contractors module is the application that controls the submitting of Contractors Hours of Work, and generates receipts based on that input.</p>
		<h4>More information to be added</h4>
		<p>Help will be added here</p>";
    }

}

/* End of file details.php */