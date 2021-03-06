<?php
namespace TYPO3\Eel\Helper;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "TYPO3.Eel".             *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Eel\ProtectedContextAwareInterface;
use TYPO3\Flow\Annotations as Flow;

/**
 * Date helpers for Eel contexts
 */
class DateHelper_Original implements ProtectedContextAwareInterface {

	/**
	 * Parse a date from string with a format to a DateTime object
	 *
	 * @param string $string
	 * @param string $format
	 * @return \DateTime
	 */
	public function parse($string, $format) {
		return \DateTime::createFromFormat($format, $string);
	}

	/**
	 * Format a date (or interval) to a string with a given format
	 *
	 * See formatting options as in PHP date()
	 *
	 * @param integer|string|\DateTime|\DateInterval $date
	 * @param string $format
	 * @return string
	 */
	public function format($date, $format) {
		if ($date instanceof \DateTime) {
			return $date->format($format);
		} elseif ($date instanceof \DateInterval) {
			return $date->format($format);
		} elseif ($date === 'now') {
			return date($format);
		} else {
			$timestamp = (integer)$date;
			return date($format, $timestamp);
		}
	}

	/**
	 * Get the current date and time
	 *
	 * Examples::
	 *
	 *     Date.now().timestamp
	 *
	 * @return \DateTime
	 */
	public function now() {
		return new \DateTime('now');
	}

	/**
	 * Get the current date
	 *
	 * @return \DateTime
	 */
	public function today() {
		return new \DateTime('today');
	}

	/**
	 * Add an interval to a date and return a new DateTime object
	 *
	 * @param \DateTime $date
	 * @param string|\DateInterval $interval
	 * @return \DateTime
	 */
	public function add($date, $interval) {
		if (!$interval instanceof \DateInterval) {
			$interval = new \DateInterval($interval);
		}
		$result = clone $date;
		return $result->add($interval);
	}

	/**
	 * Subtract an interval from a date and return a new DateTime object
	 *
	 * @param \DateTime $date
	 * @param string|\DateInterval $interval
	 * @return \DateTime
	 */
	public function subtract($date, $interval) {
		if (!$interval instanceof \DateInterval) {
			$interval = new \DateInterval($interval);
		}
		$result = clone $date;
		return $result->sub($interval);
	}

	/**
	 * Get the difference between two dates as a \DateInterval object
	 *
	 * @param \DateTime $dateA
	 * @param \DateTime $dateB
	 * @return \DateInterval
	 */
	public function diff($dateA, $dateB) {
		return $dateA->diff($dateB);
	}

	/**
	 * Get the day of month of a date
	 *
	 * @param \DateTime $dateTime
	 * @return integer The day of month of the given date
	 */
	public function dayOfMonth(\DateTime $dateTime) {
		return (integer)$dateTime->format('d');
	}

	/**
	 * Get the month of a date
	 *
	 * @param \DateTime $dateTime
	 * @return integer The month of the given date
	 */
	public function month(\DateTime $dateTime) {
		return (integer)$dateTime->format('m');
	}

	/**
	 * Get the year of a date
	 *
	 * @param \DateTime $dateTime
	 * @return integer The year of the given date
	 */
	public function year(\DateTime $dateTime) {
		return (integer)$dateTime->format('Y');
	}

	/**
	 * Get the hour of a date (24 hour format)
	 *
	 * @param \DateTime $dateTime
	 * @return integer The hour of the given date
	 */
	public function hour(\DateTime $dateTime) {
		return (integer)$dateTime->format('H');
	}

	/**
	 * Get the minute of a date
	 *
	 * @param \DateTime $dateTime
	 * @return integer The minute of the given date
	 */
	public function minute(\DateTime $dateTime) {
		return (integer)$dateTime->format('i');
	}

	/**
	 * Get the second of a date
	 *
	 * @param \DateTime $dateTime
	 * @return integer The second of the given date
	 */
	public function second(\DateTime $dateTime) {
		return (integer)$dateTime->format('s');
	}

	/**
	 * All methods are considered safe
	 *
	 * @param string $methodName
	 * @return boolean
	 */
	public function allowsCallOfMethod($methodName) {
		return TRUE;
	}
}
namespace TYPO3\Eel\Helper;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Date helpers for Eel contexts
 */
class DateHelper extends DateHelper_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {

	if (property_exists($this, 'Flow_Persistence_RelatedEntities') && is_array($this->Flow_Persistence_RelatedEntities)) {
		$persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface');
		foreach ($this->Flow_Persistence_RelatedEntities as $entityInformation) {
			$entity = $persistenceManager->getObjectByIdentifier($entityInformation['identifier'], $entityInformation['entityType'], TRUE);
			if (isset($entityInformation['entityPath'])) {
				$this->$entityInformation['propertyName'] = \TYPO3\Flow\Utility\Arrays::setValueByPath($this->$entityInformation['propertyName'], $entityInformation['entityPath'], $entity);
			} else {
				$this->$entityInformation['propertyName'] = $entity;
			}
		}
		unset($this->Flow_Persistence_RelatedEntities);
	}
			}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __sleep() {
		$result = NULL;
		$this->Flow_Object_PropertiesToSerialize = array();
	$reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
	$reflectedClass = new \ReflectionClass('TYPO3\Eel\Helper\DateHelper');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('TYPO3\Eel\Helper\DateHelper', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
		if (is_array($this->$propertyName) || (is_object($this->$propertyName) && ($this->$propertyName instanceof \ArrayObject || $this->$propertyName instanceof \SplObjectStorage ||$this->$propertyName instanceof \Doctrine\Common\Collections\Collection))) {
			foreach ($this->$propertyName as $key => $value) {
				$this->searchForEntitiesAndStoreIdentifierArray((string)$key, $value, $propertyName);
			}
		}
		if (is_object($this->$propertyName) && !$this->$propertyName instanceof \Doctrine\Common\Collections\Collection) {
			if ($this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($this->$propertyName);
			} else {
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Eel\Helper\DateHelper', $propertyName, 'var');
				if (count($varTagValues) > 0) {
					$className = trim($varTagValues[0], '\\');
				}
				if (\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->isRegistered($className) === FALSE) {
					$className = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getObjectNameByClassName(get_class($this->$propertyName));
				}
			}
			if ($this->$propertyName instanceof \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface && !\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->isNewObject($this->$propertyName) || $this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				if (!property_exists($this, 'Flow_Persistence_RelatedEntities') || !is_array($this->Flow_Persistence_RelatedEntities)) {
					$this->Flow_Persistence_RelatedEntities = array();
					$this->Flow_Object_PropertiesToSerialize[] = 'Flow_Persistence_RelatedEntities';
				}
				$identifier = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->getIdentifierByObject($this->$propertyName);
				if (!$identifier && $this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
					$identifier = current(\TYPO3\Flow\Reflection\ObjectAccess::getProperty($this->$propertyName, '_identifier', TRUE));
				}
				$this->Flow_Persistence_RelatedEntities[$propertyName] = array(
					'propertyName' => $propertyName,
					'entityType' => $className,
					'identifier' => $identifier
				);
				continue;
			}
			if ($className !== FALSE && (\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getScope($className) === \TYPO3\Flow\Object\Configuration\Configuration::SCOPE_SINGLETON || $className === 'TYPO3\Flow\Object\DependencyInjection\DependencyProxy')) {
				continue;
			}
		}
		$this->Flow_Object_PropertiesToSerialize[] = $propertyName;
	}
	$result = $this->Flow_Object_PropertiesToSerialize;
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 private function searchForEntitiesAndStoreIdentifierArray($path, $propertyValue, $originalPropertyName) {

		if (is_array($propertyValue) || (is_object($propertyValue) && ($propertyValue instanceof \ArrayObject || $propertyValue instanceof \SplObjectStorage))) {
			foreach ($propertyValue as $key => $value) {
				$this->searchForEntitiesAndStoreIdentifierArray($path . '.' . $key, $value, $originalPropertyName);
			}
		} elseif ($propertyValue instanceof \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface && !\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->isNewObject($propertyValue) || $propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
			if (!property_exists($this, 'Flow_Persistence_RelatedEntities') || !is_array($this->Flow_Persistence_RelatedEntities)) {
				$this->Flow_Persistence_RelatedEntities = array();
				$this->Flow_Object_PropertiesToSerialize[] = 'Flow_Persistence_RelatedEntities';
			}
			if ($propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($propertyValue);
			} else {
				$className = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getObjectNameByClassName(get_class($propertyValue));
			}
			$identifier = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->getIdentifierByObject($propertyValue);
			if (!$identifier && $propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
				$identifier = current(\TYPO3\Flow\Reflection\ObjectAccess::getProperty($propertyValue, '_identifier', TRUE));
			}
			$this->Flow_Persistence_RelatedEntities[$originalPropertyName . '.' . $path] = array(
				'propertyName' => $originalPropertyName,
				'entityType' => $className,
				'identifier' => $identifier,
				'entityPath' => $path
			);
			$this->$originalPropertyName = \TYPO3\Flow\Utility\Arrays::setValueByPath($this->$originalPropertyName, $path, NULL);
		}
			}
}
#