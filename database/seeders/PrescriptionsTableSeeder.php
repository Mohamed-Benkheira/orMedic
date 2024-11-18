<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prescription;

class PrescriptionsTableSeeder extends Seeder
{
    public function run()
    {
        Prescription::create([
            'illness' => 'Rhume',
            'user_id' => 1,
            'category' => 'Respiratoire',
            'more_info' => 'Les symptômes incluent éternuements, congestion, légère fièvre'
        ]);
        
        Prescription::create([
            'illness' => 'Migraine',
            'user_id' => 1,
            'category' => 'Neurologique',
            'more_info' => 'Les symptômes incluent mal de tête sévère, nausées, sensibilité à la lumière'
        ]);
        
        Prescription::create([
            'illness' => 'Douleur au dos',
            'user_id' => 1,
            'category' => 'Musculo-squelettique',
            'more_info' => 'Causée par une tension musculaire ou une blessure'
        ]);
        
        Prescription::create([
            'illness' => 'Gastro-entérite',
            'user_id' => 1,
            'category' => 'Digestif',
            'more_info' => 'Les symptômes incluent nausées, vomissements, crampes abdominales'
        ]);
        
        Prescription::create([
            'illness' => 'Asthme',
            'user_id' => 1,
            'category' => 'Respiratoire',
            'more_info' => 'Difficulté à respirer, oppression thoracique, sifflements'
        ]);
        
        Prescription::create([
            'illness' => 'Allergie',
            'user_id' => 1,
            'category' => 'Système Immunitaire',
            'more_info' => 'Causée par le pollen, la poussière ou les poils d’animaux'
        ]);
        
        Prescription::create([
            'illness' => 'Arthrite',
            'user_id' => 1,
            'category' => 'Musculo-squelettique',
            'more_info' => 'Douleurs et inflammations articulaires, mouvement limité'
        ]);
        
        Prescription::create([
            'illness' => 'Hypertension',
            'user_id' => 1,
            'category' => 'Cardiovasculaire',
            'more_info' => 'Pression artérielle élevée persistante'
        ]);
        
        Prescription::create([
            'illness' => 'Sinusite',
            'user_id' => 1,
            'category' => 'Respiratoire',
            'more_info' => 'Congestion, douleur faciale, mal de tête'
        ]);
        
        Prescription::create([
            'illness' => 'Anxiété',
            'user_id' => 1,
            'category' => 'Santé Mentale',
            'more_info' => 'Nervosité, agitation, sensation de tension'
        ]);
        
        Prescription::create([
            'illness' => 'Insomnie',
            'user_id' => 1,
            'category' => 'Santé Mentale',
            'more_info' => 'Difficulté à s’endormir ou à rester endormi'
        ]);
        
        Prescription::create([
            'illness' => 'Dépression',
            'user_id' => 1,
            'category' => 'Santé Mentale',
            'more_info' => 'Tristesse persistante, perte d’intérêt pour les activités'
        ]);
        
        Prescription::create([
            'illness' => 'Éruption cutanée',
            'user_id' => 1,
            'category' => 'Dermatologie',
            'more_info' => 'Rougeur, démangeaison, possible gonflement'
        ]);
        
        Prescription::create([
            'illness' => 'Hypercholestérolémie',
            'user_id' => 1,
            'category' => 'Cardiovasculaire',
            'more_info' => 'Facteur de risque pour les maladies cardiaques, souvent asymptomatique'
        ]);
        
        Prescription::create([
            'illness' => 'Diabète',
            'user_id' => 1,
            'category' => 'Endocrinien',
            'more_info' => 'Mictions fréquentes, soif accrue, fatigue'
        ]);
        
        Prescription::create([
            'illness' => 'Maladie cardiaque',
            'user_id' => 1,
            'category' => 'Cardiovasculaire',
            'more_info' => 'Douleur thoracique, essoufflement, fatigue'
        ]);
        
        Prescription::create([
            'illness' => 'Calculs rénaux',
            'user_id' => 1,
            'category' => 'Urinaire',
            'more_info' => 'Douleur aiguë, sang dans les urines, nausées'
        ]);
        
        Prescription::create([
            'illness' => 'Intoxication alimentaire',
            'user_id' => 1,
            'category' => 'Digestif',
            'more_info' => 'Vomissements, diarrhée, crampes abdominales'
        ]);
        
        Prescription::create([
            'illness' => 'Bronchite',
            'user_id' => 1,
            'category' => 'Respiratoire',
            'more_info' => 'Toux persistante, production de mucus, fatigue'
        ]);
        
        Prescription::create([
            'illness' => 'Trouble thyroïdien',
            'user_id' => 1,
            'category' => 'Endocrinien',
            'more_info' => 'Fatigue, changements de poids, sensibilité au froid ou à la chaleur'
        ]);
        
    }
}
