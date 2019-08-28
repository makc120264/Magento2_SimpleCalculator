<?php

namespace Tests\Calculator\Api\Model;

use Exception;

class Calculator
{
    const DEFAULT_PRECISION = 2;

    /* @var $precision */
    private $precision;

    /* @var $_left */
    private $_left;

    /* @var $right */
    private $_right;

    /* @var $_operator */
    private $_operator;

    /* @var $_allowedOperators */
    private $_allowedOperators = [
        'add',
        'subtract',
        'multiply',
        'divide',
        'power'
    ];

    /**
     * Returns total result
     *
     * @param float|int $left
     * @param float|int $right
     * @param string $operator
     * @param int|null $precision
     * @return array result
     * @throws Exception
     * @api
     */
    public function calculate($left, $right, $operator, $precision = null)
    {
        $result = $status = '';
        $this->_left = $left;
        $this->_right = $right;
        if (!is_null($precision)) {
            $this->precision = $precision;
        } else {
            $this->precision = self::DEFAULT_PRECISION;
        }

        if (in_array($operator, $this->_allowedOperators)) {
            $this->_operator = $operator;
        } else {
            $result = 'Disallowed math method';
            $status = 'Error';
        }
        if (empty($result) && empty($status)) {
            try {
                $result = $this->calculateData();
                $status = 'OK';
            } catch (Exception $e) {
                $result = $e->getMessage();
                $status = 'Error';
            }
        }
        $response = [
            'status' => $status,
            'result' => $result
        ];

        return json_encode($response);
    }

    /**
     * Return finally result
     *
     * @return float|int|
     */
    private function calculateData()
    {
        $operationResult = '';
        switch ($this->_operator) {
            case 'add':
                $operationResult = $this->_left + $this->_right;
                break;
            case 'subtract':
                $operationResult = $this->_left - $this->_right;
                break;
            case 'multiply':
                $operationResult = $this->_left * $this->_right;
                break;
            case 'divide':
                $operationResult = $this->_left / $this->_right;
                break;
            case 'power':
                $operationResult = pow($this->_left, $this->_right);
                break;
        }

        return round($operationResult, $this->precision);
    }
}
