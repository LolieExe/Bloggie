<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/api/policy.proto

namespace GPBMetadata\Google\Api;

class Policy
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
google/api/policy.proto
google.api google/protobuf/descriptor.proto"S
FieldPolicy
selector (	
resource_permission (	
resource_type (	"S
MethodPolicy
selector	 (	1
request_policies (2.google.api.FieldPolicyBm
com.google.apiBPolicyProtoPZEgoogle.golang.org/genproto/googleapis/api/serviceconfig;serviceconfig�GAPIbproto3'
        , true);

        static::$is_initialized = true;
    }
}

