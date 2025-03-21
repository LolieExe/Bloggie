<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/analytics/data/v1beta/data.proto

namespace Google\Analytics\Data\V1beta\Filter;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Filters for numeric or date values.
 *
 * Generated from protobuf message <code>google.analytics.data.v1beta.Filter.NumericFilter</code>
 */
class NumericFilter extends \Google\Protobuf\Internal\Message
{
    /**
     * The operation type for this filter.
     *
     * Generated from protobuf field <code>.google.analytics.data.v1beta.Filter.NumericFilter.Operation operation = 1;</code>
     */
    protected $operation = 0;
    /**
     * A numeric value or a date value.
     *
     * Generated from protobuf field <code>.google.analytics.data.v1beta.NumericValue value = 2;</code>
     */
    protected $value = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $operation
     *           The operation type for this filter.
     *     @type \Google\Analytics\Data\V1beta\NumericValue $value
     *           A numeric value or a date value.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Analytics\Data\V1Beta\Data::initOnce();
        parent::__construct($data);
    }

    /**
     * The operation type for this filter.
     *
     * Generated from protobuf field <code>.google.analytics.data.v1beta.Filter.NumericFilter.Operation operation = 1;</code>
     * @return int
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * The operation type for this filter.
     *
     * Generated from protobuf field <code>.google.analytics.data.v1beta.Filter.NumericFilter.Operation operation = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setOperation($var)
    {
        GPBUtil::checkEnum($var, \Google\Analytics\Data\V1beta\Filter\NumericFilter\Operation::class);
        $this->operation = $var;

        return $this;
    }

    /**
     * A numeric value or a date value.
     *
     * Generated from protobuf field <code>.google.analytics.data.v1beta.NumericValue value = 2;</code>
     * @return \Google\Analytics\Data\V1beta\NumericValue|null
     */
    public function getValue()
    {
        return $this->value;
    }

    public function hasValue()
    {
        return isset($this->value);
    }

    public function clearValue()
    {
        unset($this->value);
    }

    /**
     * A numeric value or a date value.
     *
     * Generated from protobuf field <code>.google.analytics.data.v1beta.NumericValue value = 2;</code>
     * @param \Google\Analytics\Data\V1beta\NumericValue $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkMessage($var, \Google\Analytics\Data\V1beta\NumericValue::class);
        $this->value = $var;

        return $this;
    }

}


