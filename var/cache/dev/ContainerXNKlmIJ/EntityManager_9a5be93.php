<?php

namespace ContainerXNKlmIJ;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/src/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder47922 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializera58de = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties7def3 = [
        
    ];

    public function getConnection()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'getConnection', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'getMetadataFactory', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'getExpressionBuilder', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'beginTransaction', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->beginTransaction();
    }

    public function getCache()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'getCache', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->getCache();
    }

    public function transactional($func)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'transactional', array('func' => $func), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'wrapInTransaction', array('func' => $func), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'commit', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->commit();
    }

    public function rollback()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'rollback', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'getClassMetadata', array('className' => $className), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'createQuery', array('dql' => $dql), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'createNamedQuery', array('name' => $name), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'createQueryBuilder', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'flush', array('entity' => $entity), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'clear', array('entityName' => $entityName), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->clear($entityName);
    }

    public function close()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'close', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->close();
    }

    public function persist($entity)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'persist', array('entity' => $entity), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'remove', array('entity' => $entity), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'refresh', array('entity' => $entity), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'detach', array('entity' => $entity), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'merge', array('entity' => $entity), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'getRepository', array('entityName' => $entityName), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'contains', array('entity' => $entity), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'getEventManager', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'getConfiguration', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'isOpen', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'getUnitOfWork', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'getProxyFactory', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'initializeObject', array('obj' => $obj), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'getFilters', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'isFiltersStateClean', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'hasFilters', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return $this->valueHolder47922->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializera58de = $initializer;

        return $instance;
    }

    public function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config)
    {
        static $reflection;

        if (! $this->valueHolder47922) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder47922 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder47922->__construct($conn, $config);
    }

    public function & __get($name)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, '__get', ['name' => $name], $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        if (isset(self::$publicProperties7def3[$name])) {
            return $this->valueHolder47922->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder47922;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder47922;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, '__set', array('name' => $name, 'value' => $value), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder47922;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder47922;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, '__isset', array('name' => $name), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder47922;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder47922;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, '__unset', array('name' => $name), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder47922;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder47922;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, '__clone', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        $this->valueHolder47922 = clone $this->valueHolder47922;
    }

    public function __sleep()
    {
        $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, '__sleep', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;

        return array('valueHolder47922');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializera58de = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializera58de;
    }

    public function initializeProxy() : bool
    {
        return $this->initializera58de && ($this->initializera58de->__invoke($valueHolder47922, $this, 'initializeProxy', array(), $this->initializera58de) || 1) && $this->valueHolder47922 = $valueHolder47922;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder47922;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder47922;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
