<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {
    protected $CI;
    public function __construct($config = array()) {
        parent::__construct($config);
        $this->CI =& get_instance();
    }

    public function check_unique($str, $field) {

        $field_ar = explode('.', $field);

        if($this->CI->input->post($field_ar[2]))
        {
            $id = $this->CI->input->post($field_ar[2]);
        }
        else
        {
            $id = '';
        }

        $this->CI->db->where($field_ar[1], $str);
        if($id) {
            $this->CI->db->where_not_in($field_ar[2], $id);
        }
        $result = $this->CI->db->get($field_ar[0])->num_rows();
        if($result === 0)
        {
            $response = true;
        }
        else 
        {
            $this->CI->form_validation->set_message('check_unique', 'The %s must be unique');
            $response = false;
        }
        return $response;
    }

    public function is_valid_date($date) {
        if (date('Y-m-d', strtotime($date)) == $date) {
            return TRUE;
        } else {
            $this->CI->form_validation->set_message('is_valid_date', 'The %s must be like this "yyyy-mm-dd" formate');
                return FALSE;
        }
    }

    /**
     * Verify that a string contains a specified number of
     * uppercase, lowercase, and numbers.
     *
     * @access public
     *
     * @param String $str
     * @param String $format
     *
     * @return int
     */
    public function password_check($str, $format)
    {
        $ret = TRUE;
        $pattern = '/[!@#$%^&*()]/';
        list($uppercase, $lowercase, $number,$special) = explode(',', $format);

        $str_uc = $this->count_uppercase($str);
        $str_lc = $this->count_lowercase($str);
        $str_num = $this->count_numbers($str);
        $str_spc = $this->count_occurrences($str,$pattern);

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
        elseif ($str_spc < $special) //  lacking special charcters
        {
            $ret = FALSE;
            $this->set_message('password_check', 'Password must contain at least ' . $number . ' special characters.');
        }

        return $ret;
    }

    /**
     * count the number of times an expression appears in a string
     *
     * @access private
     *
     * @param String $str
     * @param String $exp
     *
     * @return int
     */
    private function count_occurrences($str, $exp)
    {
        $match = array();
        preg_match_all($exp, $str, $match);

        return count($match[0]);
    }

    /**
     * count the number of lowercase characters in a string
     *
     * @access private
     *
     * @param String $str
     *
     * @return int
     */
    private function count_lowercase($str)
    {
        return $this->count_occurrences($str, '/[a-z]/');
    }

    /**
     * count the number of uppercase characters in a string
     *
     * @access private
     *
     * @param String $str
     *
     * @return int
     */
    private function count_uppercase($str)
    {
        return $this->count_occurrences($str, '/[A-Z]/');
    }

    /**
     * count the number of numbers characters in a string
     *
     * @access private
     *
     * @param String $str
     *
     * @return int
     */
    private function count_numbers($str)
    {
        return $this->count_occurrences($str, '/[0-9]/');
    }

    /**
     * count the special characters of times an expression appears in a string
     *
     * @access private
     *
     * @param String $str
     * @param String $exp
     *
     * @return int
     */
    private function count_specials($str)
    {
        $match = array();
        preg_match_all($exp, $str, $match);

        return count($match[0]);
    }
}