<?php

namespace App\Package;

use Nette;
use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;
use Nette\SmartObject;
use Nette\Utils\Strings;

/**
 * Základní model na přístup do databáze
 */
abstract class Database
{
    use SmartObject;

    /** @var Nette\Database\Context Připojení do databáze */
    protected Nette\Database\Context $context;

    /** @var ?string Jméno tabulky */
    protected ?string $nameTable;

    public function __construct(Nette\Database\Context $context)
    {
        $this->context = $context;
    }

    /**
     * Metoda vrací všechny řádky tabulky
     *
     * @return Selection
     */
    public function getRows(): Selection
    {
        return $this->context->table($this->getNameTable());
    }

    /**
     * Metoda zjistí jméno tabulky, pokud jméno není nastaveno zjistí se podle třídy
     *
     * @return string
     */
    public function getNameTable(): string
    {
        if ($this->nameTable === null) {
            preg_match('#(\w+)$#', static::class, $m);

            $this->nameTable = Strings::lower($m[0]);
        }

        return $this->nameTable;
    }

    /**
     * Metoda smaže záznam podle primárního klíče
     *
     * @param int $id
     *
     * @throws DatabaseException
     */
    public function delete(int $id): void
    {
        $row = $this->getRows()
            ->get($id);

        if ($row === null) {
            throw new \App\Package\DatabaseException('Row not found');
        }

        $row->delete();
    }

    /**
     * Podle id získá konkrétní řádek
     *
     * @param int $id
     *
     * @return ActiveRow
     *
     * @throws DatabaseException
     */
    public function getRow(int $id): ActiveRow
    {
        $row = $this->getRows()
            ->get($id);

        if ($row === null) {
            throw new \App\Package\DatabaseException('Row not found');
        }

        return $row;
    }

    /**
     * Uloží nebo aaktualizuje řádek
     *
     * @param iterable $data pole ukládaných dat
     * @param ?int     $id   řádek
     *
     * @return ActiveRow
     *
     * @throws DatabaseException
     */
    public function save(iterable $data, ?int $id = null): ActiveRow
    {
        // když není id, provedeme insert
        if ($id === null) {
            $row = $this->getRows()
                ->insert($data);

            if (!($row instanceof ActiveRow)) {
                throw new \App\Package\DatabaseException('Save error');
            }

            return $row;
        }

        $row = $this->getRows()
            ->get($id);

        if ($row === null) {
            throw new \App\Package\DatabaseException('Row not found');
        }

        $row->update($data);

        return $row;
    }
}
