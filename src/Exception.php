<?php

namespace Pkerrigan\Xray;

class Exception implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $identifier;

    /**
     * @var string|null
     */
    protected $message = null;

    /**
     * @var bool|null
     */
    protected $remote = null;

    /**
     * @var int|null
     */
    protected $truncated = null;

    /**
     * @var int|null
     */
    protected $skipped = null;

    /**
     * @var string|null
     */
    protected $cause = null;

    /**
     * @var StackFrame[]|null
     */
    protected $stack;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @param string $message
     *
     * @return static
     */
    public function setMessage(string $message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param bool $remote
     *
     * @return static
     */
    public function setRemote(bool $remote)
    {
        $this->remote = $remote;

        return $this;
    }

    /**
     * @param int $truncated
     *
     * @return static
     */
    public function setTruncated(int $truncated)
    {
        $this->truncated = $truncated;

        return $this;
    }

    /**
     * @param int $skipped
     *
     * @return static
     */
    public function setSkipped(int $skipped)
    {
        $this->skipped = $skipped;

        return $this;
    }

    /**
     * @param string $cause
     *
     * @return static
     */
    public function setCause(string $cause)
    {
        $this->cause = $cause;

        return $this;
    }

    /**
     * @param StackFrame $stackFrame
     *
     * @return static
     */
    public function addStackFrame(StackFrame $stackFrame)
    {
        $this->stack[] = $stackFrame;

        return $this;
    }

    /**
     * @inheritdoc
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return array_filter(
            [
                'id' => $this->identifier,
                'message' => $this->message,
                'remote' => $this->remote,
                'truncated' => $this->truncated,
                'skipped' => $this->skipped,
                'cause' => $this->cause,
                'stack' => $this->stack,
            ],
            function ($item): bool { return $item !== null; }
        );
    }
}
