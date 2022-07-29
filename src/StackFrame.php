<?php

namespace Pkerrigan\Xray;

class StackFrame implements \JsonSerializable
{
    /**
     * @var string|null
     */
    protected $path = null;

    /**
     * @var string|null
     */
    protected $line = null;

    /**
     * @var string|null
     */
    protected $label = null;

    /**
     * @param string $path
     *
     * @return static
     */
    public function setPath(string $path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @param string $line
     *
     * @return static
     */
    public function setLine(string $line)
    {
        $this->line = $line;

        return $this;
    }

    /**
     * @param string $label
     *
     * @return static
     */
    public function setLabel(string $label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @inheritdoc
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return array_filter([
            'path' => $this->path,
            'line' => $this->line,
            'label' => $this->label,
        ]);
    }
}
