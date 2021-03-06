<?php

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
* Segments Class
* @Flow\Entity
*/
class Segments_Original {

	/**
	 * code segment
	 * @var array
	 */
	protected $code = [0x0000 => 0x000A, 0xffff => 0x0000];

	/**
	 * data segment
	 * @var array
	 */
	protected $data = [0x0000 => 0x0000, 0xffff => 0x0000];

	/**
	 * stack segment
	 * @var array
	 */
	protected $stack = [0x0000 => 0x0000, 0xffff => 0x0000];

	/**
	 * extra segment
	 * @var array
	 */
	protected $extra = [0x0000 => 0x0000, 0xffff => 0x0000];

	/**
	 * returns the code at a particular offset
	 * @return array
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * returns the data at a particular offset
	 * @return array
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * returns the stack at a particular offset
	 * @return array
	 */
	public function getStack() {
		return $this->stack;
	}

	/**
	 * returns the extra at a particular offset
	 * @return array
	 */
	public function getExtra() {
		return $this->extra;
	}

	/**
	 * set the code segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setCode($code) {
		$this->code = $code;
	}

	/**
	 * set the code segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setValueInCode($offset, $value) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		$this->code[$offset] = $value;
	}

	/**
	 * set the data segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setData($data) {
		$this->data = $data;
	}

	/**
	 * set the data segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setValueInData($offset, $value) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		if($value < 0x0000 && $value > 0xffff) {
			throw new \Exception("Wrong Value Of value", 1409603810);
		}
		$this->data[$offset] = $value;
	}

	/**
	 * set the stack segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setStack($stack) {
		$this->stack = $stack;
	}

	/**
	 * set the stack segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setValueInStack($offset, $value) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		if($value < 0x0000 && $value > 0xffff) {
			throw new \Exception("Wrong Value Of value", 1409603810);
		}
		$this->stack[$offset] = $value;
	}

	/**
	 * set the extra segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setExtra($extra) {
		$this->extra = $extra;
	}

	/**
	 * set the extra segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setValueInExtra($offset, $value) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		if($value < 0x0000 && $value > 0xffff) {
			throw new \Exception("Wrong Value Of value", 1409603810);
		}
		$this->extra[$offset] = $value;
	}

	/**
	 * returns the code at a particular offset
	 * @param  int $offset
	 * @return string
	 */
	public function getCodeOffset($offset) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		$offset = hexdec($offset);
		if(isset($this->code[$offset])) {
			return $this->code[$offset];
		}
		return 0x0000;
	}

	/**
	 * returns the data at a particular offset
	 * @param  int $offset
	 * @return int
	 */
	public function getDataOffset($offset) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		$offset = hexdec($offset);
		if(isset($this->data[$offset])) {
			return $this->data[$offset];
		}
		return 0x0000;
	}

	/**
	 * returns the stack at a particular offset
	 * @param  int $offset
	 * @return int
	 */
	public function getStackOffset($offset) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		$offset = hexdec($offset);
		if(isset($this->stack[$offset])) {
			return $this->stack[$offset];
		}
		return 0x0000;
	}

	/**
	 * returns the extra at a particular offset
	 * @param  int $offset
	 * @return int
	 */
	public function getExtraOffset($offset) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		$offset = hexdec($offset);
		if(isset($this->extra[$offset])) {
			return $this->extra[$offset];
		}
		return 0x0000;
	}

}

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Segments Class
 * @\TYPO3\Flow\Annotations\Entity
 */
class Segments extends Segments_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface, \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface {

	/**
	 * @var string
	 * @ORM\Id
	 * @ORM\Column(length=40)
	 * introduced by TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect
	 */
	protected $Persistence_Object_Identifier = NULL;

	private $Flow_Aop_Proxy_targetMethodsAndGroupedAdvices = array();

	private $Flow_Aop_Proxy_groupedAdviceChains = array();

	private $Flow_Aop_Proxy_methodIsInAdviceMode = array();


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {

		$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();

			if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['__construct'])) {

			} else {
				$this->Flow_Aop_Proxy_methodIsInAdviceMode['__construct'] = TRUE;
				try {
				
					$methodArguments = array();

					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['__construct']['TYPO3\Flow\Aop\Advice\BeforeAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'project\emulate\Emulators\Emulate8086\Src\Domain\Model\Segments', '__construct', $methodArguments);
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}

					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'project\emulate\Emulators\Emulate8086\Src\Domain\Model\Segments', '__construct', $joinPoint->getMethodArguments());
					$result = $this->Flow_Aop_Proxy_invokeJoinPoint($joinPoint);

				} catch (\Exception $e) {
					unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['__construct']);
					throw $e;
				}
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['__construct']);
				return;
			}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 protected function Flow_Aop_Proxy_buildMethodsAndAdvicesArray() {
		if (method_exists(get_parent_class($this), 'Flow_Aop_Proxy_buildMethodsAndAdvicesArray') && is_callable('parent::Flow_Aop_Proxy_buildMethodsAndAdvicesArray')) parent::Flow_Aop_Proxy_buildMethodsAndAdvicesArray();

		$objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager;
		$this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices = array(
			'__construct' => array(
				'TYPO3\Flow\Aop\Advice\BeforeAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\BeforeAdvice('TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect', 'generateUuid', $objectManager, NULL),
				),
			),
			'__clone' => array(
				'TYPO3\Flow\Aop\Advice\BeforeAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\BeforeAdvice('TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect', 'generateUuid', $objectManager, NULL),
				),
				'TYPO3\Flow\Aop\Advice\AfterReturningAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\AfterReturningAdvice('TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect', 'cloneObject', $objectManager, NULL),
				),
			),
		);
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {

		$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();

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
				$result = NULL;
		if (method_exists(get_parent_class($this), '__wakeup') && is_callable('parent::__wakeup')) parent::__wakeup();
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies() {
		if (!isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices) || empty($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices)) {
			$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();
			if (is_callable('parent::Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies')) parent::Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		}	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_fixInjectedPropertiesForDoctrineProxies() {
		if (!$this instanceof \Doctrine\ORM\Proxy\Proxy || isset($this->Flow_Proxy_injectProperties_fixInjectedPropertiesForDoctrineProxies)) {
			return;
		}
		$this->Flow_Proxy_injectProperties_fixInjectedPropertiesForDoctrineProxies = TRUE;
		if (is_callable(array($this, 'Flow_Proxy_injectProperties'))) {
			$this->Flow_Proxy_injectProperties();
		}	}

	/**
	 * Autogenerated Proxy Method
	 */
	 private function Flow_Aop_Proxy_getAdviceChains($methodName) {
		$adviceChains = array();
		if (isset($this->Flow_Aop_Proxy_groupedAdviceChains[$methodName])) {
			$adviceChains = $this->Flow_Aop_Proxy_groupedAdviceChains[$methodName];
		} else {
			if (isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices[$methodName])) {
				$groupedAdvices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices[$methodName];
				if (isset($groupedAdvices['TYPO3\Flow\Aop\Advice\AroundAdvice'])) {
					$this->Flow_Aop_Proxy_groupedAdviceChains[$methodName]['TYPO3\Flow\Aop\Advice\AroundAdvice'] = new \TYPO3\Flow\Aop\Advice\AdviceChain($groupedAdvices['TYPO3\Flow\Aop\Advice\AroundAdvice']);
					$adviceChains = $this->Flow_Aop_Proxy_groupedAdviceChains[$methodName];
				}
			}
		}
		return $adviceChains;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_invokeJoinPoint(\TYPO3\Flow\Aop\JoinPointInterface $joinPoint) {
		if (__CLASS__ !== $joinPoint->getClassName()) return parent::Flow_Aop_Proxy_invokeJoinPoint($joinPoint);
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode[$joinPoint->getMethodName()])) {
			return call_user_func_array(array('self', $joinPoint->getMethodName()), $joinPoint->getMethodArguments());
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __clone() {

				// FIXME this can be removed again once Doctrine is fixed (see fixMethodsAndAdvicesArrayForDoctrineProxiesCode())
			$this->Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['__clone'])) {
		$result = NULL;

		} else {
			$this->Flow_Aop_Proxy_methodIsInAdviceMode['__clone'] = TRUE;
			try {
			
					$methodArguments = array();

					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['__clone']['TYPO3\Flow\Aop\Advice\BeforeAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'project\emulate\Emulators\Emulate8086\Src\Domain\Model\Segments', '__clone', $methodArguments);
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}

					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'project\emulate\Emulators\Emulate8086\Src\Domain\Model\Segments', '__clone', $joinPoint->getMethodArguments());
					$result = $this->Flow_Aop_Proxy_invokeJoinPoint($joinPoint);

					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['__clone']['TYPO3\Flow\Aop\Advice\AfterReturningAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'project\emulate\Emulators\Emulate8086\Src\Domain\Model\Segments', '__clone', $joinPoint->getMethodArguments(), NULL, $result);
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}

			} catch (\Exception $e) {
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['__clone']);
				throw $e;
			}
			unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['__clone']);
		}
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __sleep() {
		$result = NULL;
		$this->Flow_Object_PropertiesToSerialize = array();
	$reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
	$reflectedClass = new \ReflectionClass('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Segments');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Segments', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
		if (is_array($this->$propertyName) || (is_object($this->$propertyName) && ($this->$propertyName instanceof \ArrayObject || $this->$propertyName instanceof \SplObjectStorage ||$this->$propertyName instanceof \Doctrine\Common\Collections\Collection))) {
			foreach ($this->$propertyName as $key => $value) {
				$this->searchForEntitiesAndStoreIdentifierArray((string)$key, $value, $propertyName);
			}
		}
		if (is_object($this->$propertyName) && !$this->$propertyName instanceof \Doctrine\Common\Collections\Collection) {
			if ($this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($this->$propertyName);
			} else {
				$varTagValues = $reflectionService->getPropertyTagValues('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Segments', $propertyName, 'var');
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