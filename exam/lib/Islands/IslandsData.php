<?php

function getIslands($id=1) {
    $islands1 = array(
        array(
            array(),					// 0,0
            array('num' => 3),			// 0,1
            array(),		            // 0,2
            array(),		            // 0,3
            array('num' => 4),			// 0,4
            array(),		            // 0,5
            array(),		            // 0,6
            array('num' => 2),          // 0,7
        ),
        array(
            array('num' => 1),			// 1,0
            array(),		            // 1,1
            array(),		            // 1,2
            array(),		            // 1,3
            array(),		            // 1,4
            array(),		            // 1,5
            array('num' => 2),		    // 1,6
            array(),                    // 1,7
        ),
        array(
            array(),		            // 2,0
            array(),		            // 2,1
            array('num' => 1),		    // 2,2
            array(),		            // 2,3
            array('num' => 3),			// 2,4
            array(),		            // 2,5
            array(),		            // 2,6
            array('num' => 3),          // 2,7
        ),
        array(
            array(),		            // 3,0
            array('num' => 5),			// 3,1
            array(),		            // 3,2
            array('num' => 2),		    // 3,3
            array(),		            // 3,4
            array(),		            // 3,5
            array(),		            // 3,6
            array(),                    // 3,7
        ),
        array(
            array('num' => 2),			// 4,0
            array(),		            // 4,1
            array('num' => 3),		    // 4,2
            array(),		            // 4,3
            array('num' => 7),			// 4,4
            array(),		            // 4,5
            array('num' => 6),		    // 4,6
            array(),                    // 4,7
        ),
        array(
            array(),		            // 5,0
            array('num' => 2),			// 5,1
            array(),		            // 5,2
            array(),		            // 5,3
            array(),		            // 5,4
            array(),		            // 5,5
            array(),		            // 5,6
            array('num' => 3),          // 5,7
        ),
        array(
            array('num' => 3),			// 6,0
            array(),			        // 6,1
            array('num' => 3),		    // 6,2
            array(),		            // 6,3
            array(),			        // 6,4
            array(),		            // 6,5
            array('num' => 2),		    // 6,6
            array(),                    // 6,7
        ),
        array(
            array(),					// 7,0
            array('num' => 1),			// 7,1
            array(),		            // 7,2
            array(),		            // 7,3
            array('num' => 4),			// 7,4
            array(),		            // 7,5
            array(),		            // 7,6
            array('num' => 2),          // 7,7
        )
    );

    $islands2 = array(
        array(
            array('num' => 3),			// 0,0
            array(),		            // 0,1
            array(),		            // 0,2
            array('num' => 5),		    // 0,3
            array(),		            // 0,4
            array('num' => 6),		    // 0,5
            array(),		            // 0,6
            array('num' => 3),          // 0,7
        ),
        array(
            array(),		            // 1,0
            array('num' => 2),		    // 1,1
            array(),		            // 1,2
            array(),		            // 1,3
            array(),		            // 1,4
            array(),		            // 1,5
            array('num' => 1),		    // 1,6
            array(),                    // 1,7
        ),
        array(
            array('num' => 2),		    // 2,0
            array(),		            // 2,1
            array(),		            // 2,2
            array(),		            // 2,3
            array(),			        // 2,4
            array('num' => 2),		    // 2,5
            array(),		            // 2,6
            array('num' => 1),          // 2,7
        ),
        array(
            array(),		            // 3,0
            array('num' => 3),			// 3,1
            array(),		            // 3,2
            array('num' => 6),		    // 3,3
            array(),		            // 3,4
            array(),		            // 3,5
            array('num' => 3),		    // 3,6
            array(),                    // 3,7
        ),
        array(
            array('num' => 5),			// 4,0
            array(),		            // 4,1
            array('num' => 3),		    // 4,2
            array(),		            // 4,3
            array(),			        // 4,4
            array(),		            // 4,5
            array(),		            // 4,6
            array(),                    // 4,7
        ),
        array(
            array(),		            // 5,0
            array('num' => 2),			// 5,1
            array(),		            // 5,2
            array('num' => 3),		    // 5,3
            array(),		            // 5,4
            array('num' => 2),		    // 5,5
            array(),		            // 5,6
            array('num' => 3),          // 5,7
        ),
        array(
            array('num' => 2),			// 6,0
            array(),		            // 6,1
            array('num' => 2),		    // 6,2
            array(),		            // 6,3
            array('num' => 2),			// 6,4
            array(),		            // 6,5
            array('num' => 1),		    // 6,6
            array(),                    // 6,7
        ),
        array(
            array(),					// 7,0
            array('num' => 4),			// 7,1
            array(),		            // 7,2
            array('num' => 3),		    // 7,3
            array(),		            // 7,4
            array('num' => 2),		    // 7,5
            array(),		            // 7,6
            array('num' => 3),          // 7,7
        )
    );

    if ($id === 1) {
        return $islands1;
    }
    else {
        return $islands2;
    }
}

function getSolution($id=1) {
    $islands1 = array(
        array(
            array(),					// 0,0
            array('num' => 3),			// 0,1
            array('img' => 'h2'),		// 0,2
            array('img' => 'h2'),		// 0,3
            array('num' => 4),			// 0,4
            array('img' => 'h1'),		// 0,5
            array('img' => 'h1'),		// 0,6
            array('num' => 2),          // 0,7
        ),
        array(
            array('num' => 1),			// 1,0
            array('img' => 'v1'),		// 1,1
            array(),		            // 1,2
            array(),		            // 1,3
            array('img' => 'v1'),		// 1,4
            array(),		            // 1,5
            array('num' => 2),		    // 1,6
            array('img' => 'v1'),       // 1,7
        ),
        array(
            array('img' => 'v1'),		// 2,0
            array('img' => 'v1'),		// 2,1
            array('num' => 1),		    // 2,2
            array('img' => 'h1'),		// 2,3
            array('num' => 3),			// 2,4
            array(),		// 2,5
            array('img' => 'v2'),		// 2,6
            array('num' => 2),          // 2,7
        ),
        array(
            array('img' => 'v1'),		// 3,0
            array('num' => 5),			// 3,1
            array('img' => 'h2'),		// 3,2
            array('num' => 2),		    // 3,3
            array('img' => 'v1'),		// 3,4
            array(),		            // 3,5
            array('img' => 'v2'),		// 3,6
            array('img' => 'v2'),       // 3,7
        ),
        array(
            array('num' => 2),			// 4,0
            array('img' => 'v2'),		// 4,1
            array('num' => 3),		    // 4,2
            array('img' => 'h2'),		// 4,3
            array('num' => 7),			// 4,4
            array('img' => 'h2'),		// 4,5
            array('num' => 6),		    // 4,6
            array('img' => 'v2'),       // 4,7
        ),
        array(
            array('img' => 'v1'),		// 5,0
            array('num' => 2),			// 5,1
            array('img' => 'v1'),		// 5,2
            array(),		            // 5,3
            array('img' => 'v2'),		// 5,4
            array(),		            // 5,5
            array('img' => 'v2'),		// 5,6
            array('num' => 3),          // 5,7
        ),
        array(
            array('num' => 3),			// 6,0
            array('img' => 'h2'),		// 6,1
            array('num' => 3),		    // 6,2
            array(),		            // 6,3
            array('img' => 'v2'),		// 6,4
            array(),		            // 6,5
            array('num' => 2),		    // 6,6
            array('img' => 'v1'),       // 6,7
        ),
        array(
            array(),					// 7,0
            array('num' => 1),			// 7,1
            array('img' => 'h1'),		// 7,2
            array('img' => 'h1'),		// 7,3
            array('num' => 4),			// 7,4
            array('img' => 'h1'),		// 7,5
            array('img' => 'h1'),		// 7,6
            array('num' => 2),          // 7,7
        )
    );

    $islands2 = array(
        array(
            array('num' => 3),			// 0,0
            array('img' => 'h2'),		// 0,1
            array('img' => 'h2'),		// 0,2
            array('num' => 5),		    // 0,3
            array('img' => 'h2'),		// 0,4
            array('num' => 6),		    // 0,5
            array('img' => 'h2'),		// 0,6
            array('num' => 3),          // 0,7
        ),
        array(
            array('img' => 'v1'),		// 1,0
            array('num' => 2),		    // 1,1
            array(),		            // 1,2
            array('img' => 'v1'),		// 1,3
            array(),		            // 1,4
            array('img' => 'v2'),		// 1,5
            array('num' => 1),		    // 1,6
            array('img' => 'v1'),       // 1,7
        ),
        array(
            array('num' => 2),		    // 2,0
            array('img' => 'v2'),		// 2,1
            array(),		            // 2,2
            array('img' => 'v1'),		// 2,3
            array(),			        // 2,4
            array('num' => 2),		    // 2,5
            array('img' => 'v1'),		// 2,6
            array('num' => 1),          // 2,7
        ),
        array(
            array('img' => 'v1'),		// 3,0
            array('num' => 3),			// 3,1
            array('img' => 'h1'),		// 3,2
            array('num' => 6),		    // 3,3
            array('img' => 'h2'),		// 3,4
            array('img' => 'h2'),		// 3,5
            array('num' => 3),		    // 3,6
            array(),                    // 3,7
        ),
        array(
            array('num' => 5),			// 4,0
            array('img' => 'h2'),		// 4,1
            array('num' => 3),		    // 4,2
            array('img' => 'v2'),		// 4,3
            array(),			        // 4,4
            array(),		            // 4,5
            array(),		            // 4,6
            array(),                    // 4,7
        ),
        array(
            array('img' => 'v2'),		// 5,0
            array('num' => 2),			// 5,1
            array('img' => 'v1'),		// 5,2
            array('num' => 3),		    // 5,3
            array('img' => 'h1'),		// 5,4
            array('num' => 2),		    // 5,5
            array('img' => 'h1'),		// 5,6
            array('num' => 3),          // 5,7
        ),
        array(
            array('num' => 2),			// 6,0
            array('img' => 'v2'),		// 6,1
            array('num' => 2),		    // 6,2
            array('img' => 'h1'),		// 6,3
            array('num' => 2),			// 6,4
            array('img' => 'h1'),		// 6,5
            array('num' => 1),		    // 6,6
            array('img' => 'v2'),       // 6,7
        ),
        array(
            array(),					// 7,0
            array('num' => 4),			// 7,1
            array('img' => 'h2'),		// 7,2
            array('num' => 3),		    // 7,3
            array('img' => 'h1'),		// 7,4
            array('num' => 2),		    // 7,5
            array('img' => 'h1'),		// 7,6
            array('num' => 3),          // 7,7
        )
    );

    if ($id === 1) {
        return $islands1;
    }
    else {
        return $islands2;
    }
}