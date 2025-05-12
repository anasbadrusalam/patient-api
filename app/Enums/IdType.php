<?php

namespace App\Enums;

enum IdType: string
{
    case MyKad       = 'mykad';
    case Passport    = 'passport';
    case MyPR        = 'mypr';
    case MyKid       = 'mykid';
    case MyTentera   = 'mytentera';
    case PoliceID    = 'police_id';
    case IMM13       = 'imm13';
    case ForeignID   = 'foreign_id';
    case Other       = 'other';

    public function label(): string
    {
        return match ($this) {
            self::MyKad      => 'MyKad (Kad Pengenalan Warganegara)',
            self::Passport   => 'Pasport',
            self::MyPR       => 'MyPR (Penduduk Tetap)',
            self::MyKid      => 'MyKid (Kanak-kanak bawah 12 tahun)',
            self::MyTentera  => 'MyTentera (Anggota Tentera)',
            self::PoliceID   => 'Kad Polis',
            self::IMM13      => 'IMM13 (Dokumen Imigresen)',
            self::ForeignID  => 'ID Warganegara Asing',
            self::Other      => 'Lain-lain',
        };
    }
    
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
