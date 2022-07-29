<?php

namespace Pkerrigan\Xray;

class Cause implements \JsonSerializable
{
    /**
     * @var string|null
     */
    protected $identifier = null;

    /**
     * @var string|null
     */
    protected $workingDirectory = null;

    /**
     * @var array
     */
    protected $paths = [];

    /**
     * @var array
     */
    protected $exceptions = [];

    /**
     * @param string $identifier
     *
     * @return static
     */
    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * @param string $workingDirectory
     *
     * @return Cause
     */
    public function setWorkingDirectory(string $workingDirectory): Cause
    {
        $this->workingDirectory = $workingDirectory;

        return $this;
    }

    /**
     * @param array $paths
     *
     * @return static
     */
    public function setPaths(array $paths)
    {
        $this->paths = $paths;

        return $this;
    }

    /**
     * @param Exception[] $exceptions
     *
     * @return static
     */
    public function setExceptions(array $exceptions): Cause
    {
        $this->exceptions = $exceptions;

        return $this;
    }

    /**
     * @inheritdoc
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        if ($this->identifier !== null) {
            return $this->identifier;
        }

        return array_filter([
            'working_directory' => $this->workingDirectory,
            'paths' => $this->paths,
            'exceptions' => $this->exceptions,
        ]);
    }
}
