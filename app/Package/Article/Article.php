<?php

namespace App\Package\Article;

use Nette\Utils\DateTime;

class Article
{
    /** @var int|null */
    private ?int $id;

    private string $name;

    private string $perex;

    private DateTime $created;

    private bool $requiresLoggingIn;

    /**
     * @param int|null $id
     * @param string   $name
     * @param string   $perex
     * @param DateTime $created
     * @param bool     $requiresLoggingIn
     */
    public function __construct(?int $id, string $name, string $perex, DateTime $created, bool $requiresLoggingIn)
    {
        $this->id = $id;
        $this->name = $name;
        $this->perex = $perex;
        $this->created = $created;
        $this->requiresLoggingIn = $requiresLoggingIn;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPerex(): string
    {
        return $this->perex;
    }

    /**
     * @param string $perex
     */
    public function setPerex(string $perex): void
    {
        $this->perex = $perex;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }

    /**
     * @return bool
     */
    public function isRequiresLoggingIn(): bool
    {
        return $this->requiresLoggingIn;
    }

    /**
     * @param bool $requiresLoggingIn
     */
    public function setRequiresLoggingIn(bool $requiresLoggingIn): void
    {
        $this->requiresLoggingIn = $requiresLoggingIn;
    }
}
