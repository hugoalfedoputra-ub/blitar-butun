<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property timestamp $ReceivingDateTime ReceivingDateTime
@property text $Text Text
@property varchar $SenderNumber SenderNumber
@property enum $Coding Coding
@property text $UDH UDH
@property varchar $SMSCNumber SMSCNumber
@property int $Class Class
@property text $TextDecoded TextDecoded
@property int $ID ID
@property text $RecipientID RecipientID
@property enum $Processed Processed
   
 */
class InboxModel extends Model 
{
    const PROCESSED_FALSE='false';

const PROCESSED_TRUE='true';

const CODING_DEFAULT_NO_COMPRESSION='Default_No_Compression';

const CODING_UNICODE_NO_COMPRESSION='Unicode_No_Compression';

const CODING_8BIT='8bit';

const CODING_DEFAULT_COMPRESSION='Default_Compression';

const CODING_UNICODE_COMPRESSION='Unicode_Compression';

    /**
    * Database table name
    */
    protected $table = 'inbox';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Processed',
'ReceivingDateTime',
'Text',
'SenderNumber',
'Coding',
'UDH',
'SMSCNumber',
'Class',
'TextDecoded',
'ID',
'RecipientID',
'Processed'];

    /**
    * Date time columns.
    */
    protected $dates=['ReceivingDateTime'];




}