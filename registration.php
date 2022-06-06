<?php

/**
 * HyvaAlgoliaSearch
 *
 * Hyva compatibility for AlgoliaSearch instant search results page
 *
 * @package ImaginationMedia\HyvaAlgoliaSearch
 * @author Vasilii Burlacu <vasilii@imaginationmedia.com>
 * @copyright Copyright (c) 2022 Imagination Media (https://www.imaginationmedia.com/)
 * @license https://opensource.org/licenses/OSL-3.0.php Open Software License 3.0
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(ComponentRegistrar::MODULE, 'ImaginationMedia_HyvaAlgoliaSearch', __DIR__);
