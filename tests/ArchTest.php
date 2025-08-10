<?php

declare(strict_types=1);

arch('no dd, dump, or ddd calls')
    ->expect(['dd', 'dump', 'ddd'])
    ->each
    ->not
    ->toBeUsed();
