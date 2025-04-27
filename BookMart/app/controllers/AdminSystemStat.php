<?php

class AdminSystemStat extends Controller {
    private $systemStatsModel;

    public function index() {
        $systemStatModel = new SystemStats();
        $stat = $systemStatModel->getCurrentStats();
        
        $this->view('adminSystemStat', [
            'stats' => $stat
        ]);
    }

    public function getAll() {
        $systemStatModel = new SystemStats();
        return $systemStatModel->findAll();
    }
    

    public function updateStat() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            
            // Validate and collect form data
            $systemfee_book = filter_input(INPUT_POST, 'systemfee_book', FILTER_VALIDATE_FLOAT);
            $systemfee_add = filter_input(INPUT_POST, 'systemfee_add', FILTER_VALIDATE_FLOAT);
            $deliveryfee = filter_input(INPUT_POST, 'deliveryfee', FILTER_VALIDATE_FLOAT);
            $system_email = filter_input(INPUT_POST, 'system_email', FILTER_VALIDATE_EMAIL);
            
            // Validation
            if ($systemfee_book === false || $systemfee_book === null) {
                $errors[] = 'System fee for books must be a valid number.';
            }
            
            if ($systemfee_add === false || $systemfee_add === null) {
                $errors[] = 'System fee for ads must be a valid number.';
            }
            
            if ($deliveryfee === false || $deliveryfee === null) {
                $errors[] = 'Delivery fee must be a valid number.';
            }
            
            if ($system_email === false) {
                $errors[] = 'Please enter a valid email address.';
            }
    
            if (!empty($errors)) {
                $_SESSION['error_message'] = implode('<br>', $errors);
                redirect('adminSystemStat');
                return;
            }
    
            // Update the stats in the database
            $systemStatModel = new SystemStats();
            $currentStats = $systemStatModel->getCurrentStats();
            
            if (!$currentStats) {
                $_SESSION['error_message'] = 'No statistics record found to update.';
                redirect('adminSystemStat');
                return;
            }
            
            $data = [
                'id' => $currentStats->id, // Ensure we're updating the correct record
                'systemfee_book' => $systemfee_book,
                'systemfee_add' => $systemfee_add,
                'deliveryfee' => $deliveryfee,
                'system_email' => $system_email
            ];
            
            $result = $systemStatModel->update($data['id'], $data);
            
            if (!$result) {
                $_SESSION['success_message'] = 'System statistics updated successfully!';
            } else {
                $_SESSION['error_message'] = 'Failed to update system statistics.';
            }
            
            redirect('adminSystemStat');
        } else {
            redirect('adminSystemStat');
        }
    }
}