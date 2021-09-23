<?php

namespace WhichBrowser\Data;

use WhichBrowser\Constants;
use WhichBrowser\Model\Device;

class IphoneDetector
{
    private static $IPHONES = [
        'iPhone SE' => [ 568, 2, 'A1723' ],
        'iPhone 6S' => [ 667, 2, 'A1633' ],
        'iPhone 6S Plus' => [ [736, 667], 3, 'A1634' ],
        'iPhone 7' => [ [568, 667], 2, 'A1660' ],
        'iPhone 7 Plus' => [ [736, 667], 3, 'A1661' ],
        'iPhone 8' => [ [568, 667], 2, 'A1905' ],
        'iPhone 8 Plus' => [ [736, 667], 3, 'A1897' ],
        'iPhone X' => [ [812, 693], 3, 'A1865' ],
        'iPhone XS' => [ 812, 3, 'A2097' ],
        'iPhone XS Max' => [ 896, 3, 'A2101' ],
        'iPhone XR' => [ 896, 2, 'A2105' ],
        'iPhone 11' => [ 896, 2, 'A2221' ],
        'iPhone 11 Pro' => [ 812, 3, 'A2215' ],
        'iPhone 11 Pro Max' => [ 896, 3, 'A2218' ],
        'iPhone SE (2020)' => [ [568, 667], 2, 'A2296' ],
        'iPhone 12' => [ 844, 3, 'A2403' ],
        'iPhone 12 mini' => [ 812, 3, 'A2399' ],
        'iPhone 12 Pro Max' => [ [896, 926], 3, 'A2411' ]
    ];

    private static $IPHONES_BENCHMARKS = [
        'iPhone SE' => [
            '-924917326' => [ '12.x' ],
            '2048727691' => [ '13.x' ],
            '-876627748' => [ '14.x' ],
            '-1061871976' => [ '15.x' ]
        ],
        'iPhone 6S' => [
            '-924917326' => [ '12.x' ],
            '2048727691' => [ '13.x' ],
            '-876627748' => [ '14.x' ],
            '-1061871976' => [ '15.x' ]
        ],
        'iPhone 6S Plus' => [
            '-924917326' => [ '12.x', [
                [9.000000, 13.000000],
                [25.000000, 30.000000]
            ]],
            '2048727691' => [ '13.x', [
                [5.400000, 6.300000]
            ]],
            '-876627748' => [ '14.x', [
                [5.400000, 7.200000],
                [11.000000, 14.000000]
            ]],
            '-1061871976' => [ '15.x', [
                [5.500000, 6.500000]
            ]]
        ],
        'iPhone 7' => [
            '-924917326' => [ '12.x', [
                [6.500000, 9.300000],
                [15.000000, 20.000000]
            ]],
            '2048727691' => [ '13.x', [
                [3.400000, 4.200000]
            ]],
            '-876627748' => [ '14.x', [
                [3.000000, 4.800000]
            ]],
            '-1061871976' => [ '15.x', [
                [3.000000, 4.500000]
            ]]
        ],
        'iPhone 7 Plus' => [
            '-924917326' => [ '12.x', [
                [6.000000, 8.500000],
                [15.000000, 20.000000]
            ]],
            '2048727691' => [ '13.x', [
                [3.400000, 4.200000]
            ]],
            '-876627748' => [ '14.x', [
                [3.200000, 5.300000],
                [7.300000, 10.000000]
            ]],
            '-1061871977' => [ '15.x', [
                [3.000000, 4.500000]
            ]]
        ],
        'iPhone 8' => [
            '127607616' => [ '12.x' ],
            '1588036652' => [ '13.x' ],
            '742196340' => [ '14.x' ],
            '1861580623' => [ '15.x' ]
        ],
        'iPhone 8 Plus' => [
            '127607616' => [ '12.x' ],
            '1588036652' => [ '13.x' ],
            '742196340' => [ '14.x 1' ],
            '-2020028189' => [ '14.x 2' ],
            '-423472086' => [ '14.x 3' ],
            '1861580623' => [ '15.x' ]
        ],
        'iPhone X' => [
            '127607616' => [ '12.x' ],
            '1588036652' => [ '13.x' ],
            '742196340' => [ '14.x 1' ],
            '-2020028189' => [ '14.x 2'],
            '-423472086' => [ '14.x 3' ],
            '1861580623' => [ '15.x' ]
        ],
        'iPhone XS' => [
            '-1555617484' => [ '12.x' ],
            '-131154645' => [ '13.x', [
                [2.000000, 2.100000]
            ]],
            '-2095308119' => [ '14.x 1', [
                [2.100000, 2.400000]
            ]],
            '-1821413258' => [ '14.x 2', [
                [2.150000, 2.400000]
            ]],
            '1132276657' => [ '15.x' ]
        ],
        'iPhone XS Max' => [
            '-1555617484' => [ '12.x' ],
            '-131154645' => [ '13.x', [
                [2.000000, 3.000000]
            ]],
            '-2095308119' => [ '14.x 1', [
                [2.150000, 2.500000]
            ]],
            '-1821413258' => [ '14.x 2', [
                [2.150000, 2.500000]
            ]],
            '1132276657' => [ '15.x' ]
        ],
        'iPhone XR' => [
            '-1555617484' => [ '12.x' ],
            '-131154645' => [ '13.x', [
                [2.000000, 3.000000]
            ]],
            '-2095308119' => [ '14.x 1', [
                [2.150000, 2.500000],
                [3.100000, 3.300000]
            ]],
            '-1821413258' => [ '14.x 2', [
                [2.150000, 2.500000],
                [3.100000, 3.300000]
            ]],
            '1132276657' => [ '15.x' ]
        ],
        'iPhone 11' => [
            '-131154645' => ['13.x', [
                [1.500000, 1.600000]
            ]],
            '-2095308119' => ['14.x 1', [
                [1.600000, 2.000000],
                [2.600000, 3.000000]
            ]],
            '-1821413258' => ['14.x 2', [
                [1.600000, 2.000000],
                [2.600000, 3.000000]
            ]],
            '-481715509' => [ '15.x' ]
        ],
        'iPhone 11 Pro' => [
            '-131154645' => [ '13.x', [
                [1.500000, 1.600000]
            ]],
            '-2095308119' => [ '14.x 1', [
                [1.600000, 2.000000],
                [2.500000, 3.100000]
            ]],
            '-1821413258' => [ '14.x 2', [
                [1.600000, 2.000000],
                [2.500000, 3.100000]
            ]],
            '-481715509' => [ '15.x' ]
        ],
        'iPhone 11 Pro Max' => [
            '-131154645' => [ '13.x', [
                [1.500000, 1.890000],
                [2.450000, 2.950000]
            ]],
            '-2095308119' => [ '14.x 1', [
                [1.500000, 2.000000]
            ]],
            '-1821413258' => [ '14.x 2', [
                [1.500000, 2.000000]
            ]],
            '-481715509' => [ '15.x']
        ],
        'iPhone SE (2020)' => [
            '-131154645' => [ '13.X' ],
            '-2095308119' => [ '14.x' ],
            '-481715509' => [ '15.x' ]
        ],
        'iPhone 12' => [
            '-118752313' => [ '14.x' ],
            '814470808' => [ '15.x' ]
        ],
        'iPhone 12 mini' => [
            '-118752313' => [ '14,x' ],
            '814470808' => [ '15.x' ]
        ],
        'iPhone 12 Pro Max' => [
            '-118752313' => [ '14.x' ],
            '814470808' => [ '15.x' ]
        ]
    ];

    public static function identify($screenHeight, $pixelRatio, $chash, $ops): ?Device
    {
        $searchResults = array_filter(self::$IPHONES, function(array $data, string $model) use($screenHeight, $pixelRatio) {
            $validHeights = is_array($data[0]) ? $data[0] : [ $data[0] ];

            return in_array($screenHeight, $validHeights) && $pixelRatio === $data[1];
        }, \ARRAY_FILTER_USE_BOTH);

        if(empty($searchResults)) {
            return null;
        }

        if(count($searchResults) === 1) {
            return self::createFromFirstResult($searchResults);
        }

        $searchResults = array_filter($searchResults, function(array $data, string $model) use($chash, $ops) {
            $benchResult = self::$IPHONES_BENCHMARKS[$model][$chash] ?? null;

            if(!$benchResult) {
                return false;
            }

            if(isset($benchResult[1])) {
                foreach($benchResult[1] as $expectedOps) {
                    $minOps = $expectedOps[0];
                    $maxOps = $expectedOps[1];

                    if($minOps <= $ops && $ops <= $maxOps) {
                        return true;
                    }
                }

                return false;
            } else {
                return true;
            }
        }, \ARRAY_FILTER_USE_BOTH);

        if(empty($searchResults)) {
            return null;
        }

        return self::createFromFirstResult($searchResults);
    }

    public static function createFromFirstResult(array $results): Device
    {
        $model = key($results);
        return self::createDevice($model, $results[$model][2]);
    }

    public static function createDevice($model, $identifier): Device
    {
        return new Device([
            'type'          => Constants\DeviceType::MOBILE,
            'identified'    => Constants\Id::PATTERN,
            'manufacturer'  => 'Apple',
            'model'         => $model,
            'identifier'    => $identifier,
            'generic'       => false
        ]);
    }
}
