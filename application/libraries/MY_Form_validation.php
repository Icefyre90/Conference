<?php
class MY_Form_validation extends CI_Form_validation
{
    public function password_check($str, $format)
    {
        $ret = TRUE;
        list($uppercase, $lowercase, $number, $first) = explode(',', $format);

        $str_uc = $this->count_uppercase($str);
        $str_lc = $this->count_lowercase($str);
        $str_num = $this->count_numbers($str);
        $str_frs = $this->first_letter($str);

        if ($str_uc < $uppercase) // lacking uppercase characters
        {
            $ret = FALSE;
            $this->set_message('password_check', 'Password must contain at least ' . $uppercase . ' uppercase characters.');
        }
        elseif ($str_lc < $lowercase) // lacking lowercase characters
        {
            $ret = FALSE;
            $this->set_message('password_check', 'Password must contain at least ' . $lowercase . ' lowercase characters.');
        }
        elseif ($str_num < $number) //  lacking numbers
        {
            $ret = FALSE;
            $this->set_message('password_check', 'Password must contain at least ' . $number . ' numbers characters.');
        }
        elseif ($str_frs < $first) // lacking uppercase characters
        {
            $ret = FALSE;
            $this->set_message('password_check', 'First character must be a letter.');
        }
        

        return $ret;
    }
    private function count_occurrences($str, $exp)
    {
        $match = array();
        preg_match_all($exp, $str, $match);

        return count($match[0]);
    }

    private function count_lowercase($str)
    {
        return $this->count_occurrences($str, '/[a-z]/');
    }

    private function count_uppercase($str)
    {
        return $this->count_occurrences($str, '/[A-Z]/');
    }

    private function count_numbers($str)
    {
        return $this->count_occurrences($str, '/[0-9]/');
    }
    
    private function first_letter($str){
        return $this->count_occurrences($str, '/^[a-zA-Z]/');
    }
}