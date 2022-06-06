# ImaginationMedia_HyvaAlgoliaSearch

This module exits to solve the following problems of `Hyva_AlgoliaSearch`:

1. Algolia's "Instant Search Results Page" is not compatible with Hyva-based
themes.


### Technical Details

##### How the problem #1 is solved.

It was changed the way instantsearch is initialized (see `instantsearch.phtml`)
and the `instantsearch.js` was adjusted to match how Hyva javascript works.

```diff
--- a/vendor/algolia/algoliasearch-magento-2/view/frontend/web/instantsearch.js
+++ b/app/code/ImaginationMedia/HyvaAlgoliaSearch/view/frontend/web/js/instantsearch.js
@@ -1,4 +1,15 @@
-requirejs(['algoliaBundle', 'Magento_Catalog/js/price-utils'], function (algoliaBundle, priceUtils) {
+/**
+ * HyvaAlgoliaSearch
+ *
+ * Hyva compatibility for AlgoliaSearch instant search results page
+ *
+ * @package ImaginationMedia\HyvaAlgoliaSearch
+ * @author Vasilii Burlacu <vasilii@imaginationmedia.com>
+ * @copyright Copyright (c) 2022 Imagination Media (https://www.imaginationmedia.com/)
+ * @license https://opensource.org/licenses/OSL-3.0.php Open Software License 3.0
+ */
+
+const algoliaInstantSearch = function(algoliaConfig) {
 	algoliaBundle.$(function ($) {
 		/** We have nothing to do here if instantsearch is not enabled **/
 		if (!algoliaConfig.instant.enabled || !(algoliaConfig.isSearchPage || !algoliaConfig.autocomplete.enabled)) {
@@ -539,7 +550,7 @@ requirejs(['algoliaBundle', 'Magento_Catalog/js/price-utils'], function (algolia
 						format: function (formattedValue) {
 							return facet.attribute.match(/price/) === null ?
 								parseInt(formattedValue) :
-								priceUtils.formatPrice(formattedValue, algoliaConfig.priceFormat);
+								hyva.formatPrice(formattedValue);
 						}
 					}
 				}];
@@ -681,4 +692,4 @@ requirejs(['algoliaBundle', 'Magento_Catalog/js/price-utils'], function (algolia
 
 		return options;
 	}
-});
+}
```
