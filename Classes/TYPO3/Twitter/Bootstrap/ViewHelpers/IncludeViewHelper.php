<?php
namespace TYPO3\Twitter\Bootstrap\ViewHelpers;

/*                                                                           *
 * This script belongs to the TYPO3 Flow package "TYPO3.Twitter.Bootstrap".  *
 *                                                                           *
 *                                                                           */

use TYPO3\Flow\Annotations as Flow;

/**
 *
 * @Flow\Scope("prototype")
 */
class IncludeViewHelper extends \TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @var \TYPO3\Flow\Resource\ResourceManager
	 * @Flow\Inject
	 */
	protected $resourceManager;

	/**
	 * Get the header include code for including Twitter Bootstrap on a page. If needed
	 * the jQuery library can be included, too.
	 *
	 * Example usage:
	 * {namespace bootstrap=TYPO3\Twitter\Bootstrap\ViewHelpers}
	 * <bootstrap:include />
	 *
	 * @param string $version
	 * @param boolean $minified
	 * @param boolean $includeJQuery
	 * @param string $jQueryVersion
	 * @return string
	 */
	public function render($version = '2', $minified = TRUE, $includeJQuery = FALSE, $jQueryVersion = '1.8.2') {
		$content = sprintf(
			'<link rel="stylesheet" href="%s" />' . PHP_EOL,
			$this->resourceManager->getPublicPackageResourceUri('TYPO3.Twitter.Bootstrap', $version . '/css/bootstrap' . ($minified === TRUE ? '.min' : '') . '.css')
		);

		if ($includeJQuery === TRUE) {
			$content .= sprintf(
				'<script src="%s"></script>' . PHP_EOL,
				$this->resourceManager->getPublicPackageResourceUri('TYPO3.Twitter.Bootstrap', 'Libraries/jQuery/jquery-' . $jQueryVersion . ($minified === TRUE ? '.min' : '') . '.js')
			);
		}

		$content .= sprintf(
			'<script src="%s"></script>' . PHP_EOL,
				$this->resourceManager->getPublicPackageResourceUri('TYPO3.Twitter.Bootstrap', $version . '/js/bootstrap' . ($minified === TRUE ? '.min' : '') . '.js')
		);

		return $content;
	}
}
?>