<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property timestamp $InsertIntoDB InsertIntoDB
@property timestamp $SendingDateTime SendingDateTime
@property time $SendBefore SendBefore
@property time $SendAfter SendAfter
@property text $Text Text
@property varchar $DestinationNumber DestinationNumber
@property enum $Coding Coding
@property text $UDH UDH
@property int $Class Class
@property text $TextDecoded TextDecoded
@property int $ID ID
@property enum $MultiPart MultiPart
@property int $RelativeValidity RelativeValidity
@property varchar $SenderID SenderID
@property timestamp $SendingTimeOut SendingTimeOut
@property enum $DeliveryReport DeliveryReport
@property text $CreatorID CreatorID
   
 */
class OutboxModel extends Model 
{
    const DELIVERYREPORT_DEFAULT='default';

const DELIVERYREPORT_YES='yes';

const DELIVERYREPORT_NO='no';

const MULTIPART_FALSE='false';

const MULTIPART_TRUE='true';

const CODING_DEFAULT_NO_COMPRESSION='Default_No_Compression';

const CODING_UNICODE_NO_COMPRESSION='Unicode_No_Compression';

const CODING_8BIT='8bit';

const CODING_DEFAULT_COMPRESSION='Default_Compression';

const CODING_UNICODE_COMPRESSION='Unicode_Compression';

    /**
    * Database table name
    */
    protected $table = 'outbox';

    /**
    * Mass assignable columns
    */
    protected $fillable=['CreatorID',
'InsertIntoDB',
'SendingDateTime',
'SendBefore',
'SendAfter',
'Text',
'DestinationNumber',
'Coding',
'UDH',
'Class',
'TextDecoded',
'ID',
'MultiPart',
'RelativeValidity',
'SenderID',
'SendingTimeOut',
'DeliveryReport',
'CreatorID'];

    /**
    * Date time columns.
    */
    protected $dates=['InsertIntoDB',
'SendingDateTime',
'SendBefore',
'SendAfter',
'SendingTimeOut'];




}