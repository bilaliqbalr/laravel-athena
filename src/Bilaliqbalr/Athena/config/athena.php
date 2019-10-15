<?php


$athenaConfiguration = [
    /*
    |--------------------------------------------------------------------------
    | Athena Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the athena
    | bucket, outputdirectory
    |
    */
    'credentials' => [

        'key'    => env('AWS_ACCESS_KEY_ID', ''),

        'secret' => env('AWS_SECRET_ACCESS_KEY', ''),

    ],

    'region' => env('AWS_REGION', 'us-east-1'),

    'version' => 'latest',

    'database' => env('ATHENA_DB'),

    'prefix' => env('ATHENA_TABLE_PREFIX', ''),

    'bucket' => env('S3_BUCKET'),

    'outputfolder' => env('ATHENA_OUTPUT_FOLDER'),
];

$athenaConfiguration['s3output'] = 's3://' . $athenaConfiguration['bucket'] . '/' . $athenaConfiguration['outputfolder'];

return $athenaConfiguration;
