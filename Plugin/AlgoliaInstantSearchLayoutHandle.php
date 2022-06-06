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

declare(strict_types=1);

namespace ImaginationMedia\HyvaAlgoliaSearch\Plugin;

use Algolia\AlgoliaSearch\Model\Observer as AlgoliaObserver;
use Magento\Framework\Event\Observer;
use Magento\Framework\View\Layout;

/**
 * Class AlgoliaInstantSearchLayoutHandle
 */
class AlgoliaInstantSearchLayoutHandle
{
    /**
     * @param AlgoliaObserver $subject
     * @param $result
     * @param Observer $observer
     *
     * @return void
     */
    public function afterExecute(AlgoliaObserver $subject, $result, Observer $observer): void
    {
        /** @var Layout $layout */
        $layout = $observer->getData('layout');
        $handles = $layout->getUpdate()->getHandles();

        if (
            in_array('algolia_search_handle', $handles) &&
            (
                in_array('catalog_category_view', $handles) ||
                in_array('catalogsearch_result_index', $handles)
            )
        ) {
            $layout->getUpdate()->addHandle('algolia_instantsearch_handle');
        }
    }
}
