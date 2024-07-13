<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property timestamp $InsertIntoDB InsertIntoDB
@property timestamp $SendingDateTime SendingDateTime
@property timestamp $DeliveryDateTime DeliveryDateTime
@property text $Text Text
@property varchar $DestinationNumber DestinationNumber
@property enum $Coding Coding
@property text $UDH UDH
@property varchar $SMSCNumber SMSCNumber
@property int $Class Class
@property text $TextDecoded TextDecoded
@property int $ID ID
@property varchar $SenderID SenderID
@property int $SequencePosition SequencePosition
@property enum $Status Status
@property int $StatusError StatusError
@property int $TPMR TPMR
@property int $RelativeValidity RelativeValidity
@property text $CreatorID CreatorID
   
 */
class Sentitems extends Model
{
    const STATUS_SENDINGOK = 'SendingOK';

    const STATUS_SENDINGOKNOREPORT = 'SendingOKNoReport';

    const STATUS_SENDINGERROR = 'SendingError';

    const STATUS_DELIVERYOK = 'DeliveryOK';

    const STATUS_DELIVERYFAILED = 'DeliveryFailed';

    const STATUS_DELIVERYPENDING = 'DeliveryPending';

    const STATUS_DELIVERYUNKNOWN = 'DeliveryUnknown';

    const STATUS_ERROR = 'Error';

    const CODING_DEFAULT_NO_COMPRESSION = 'Default_No_Compression';

    const CODING_UNICODE_NO_COMPRESSION = 'Unicode_No_Compression';

    const CODING_8BIT = '8bit';

    const CODING_DEFAULT_COMPRESSION = 'Default_Compression';

    const CODING_UNICODE_COMPRESSION = 'Unicode_Compression';

    /**
     * Database table name
     */
    protected $table = 'sentitems';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'CreatorID',
        'InsertIntoDB',
        'SendingDateTime',
        'DeliveryDateTime',
        'Text',
        'DestinationNumber',
        'Coding',
        'UDH',
        'SMSCNumber',
        'Class',
        'TextDecoded',
        'ID',
        'SenderID',
        'SequencePosition',
        'Status',
        'StatusError',
        'TPMR',
        'RelativeValidity',
        'CreatorID'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [
        'InsertIntoDB',
        'SendingDateTime',
        'DeliveryDateTime'
    ];
}
