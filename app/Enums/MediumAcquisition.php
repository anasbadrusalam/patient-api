<?php

namespace App\Enums;

enum MediumAcquisition: string
{
    case WalkIn           = 'walk_in';
    case ReferralDoctor   = 'referral_doctor';
    case ReferralPatient  = 'referral_patient';
    case SocialMedia      = 'social_media';
    case Website          = 'website';
    case OnlineAds        = 'online_ads';
    case Insurance        = 'insurance';
    case HospitalPartner  = 'hospital_partner';
    case Other            = 'other';

    public function label(): string
    {
        return match ($this) {
            self::WalkIn => 'Datang Terus',
            self::ReferralDoctor => 'Rujukan Doktor',
            self::ReferralPatient => 'Rujukan Pesakit',
            self::SocialMedia => 'Media Sosial',
            self::Website => 'Laman Web',
            self::OnlineAds => 'Iklan Dalam Talian',
            self::Insurance => 'Melalui Insurans',
            self::HospitalPartner => 'Rakan Hospital',
            self::Other => 'Lain-lain',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
