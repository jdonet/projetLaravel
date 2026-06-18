<?php
namespace App\Services;

class CalculateurPrix
{
    /**
     * Calcule le prix TTC à partir d'un prix HT et d'un taux de taxe.
     * Le taux de taxe est exprimé en décimal (ex: 0.15 pour 15%).
     *
     * @throws \InvalidArgumentException si le taux est négatif
     */
    public function calculerAvecTaxe(float $prixHT, float $tauxTaxe): float
    {
        if ($tauxTaxe < 0  or $prixHT < 0) {
            throw new \InvalidArgumentException("Le taux de taxe et le prix ne peuvent pas être négatifs.");
        }

        return round($prixHT * (1 + $tauxTaxe), 2);
    }

    /**
     * Applique une remise en pourcentage sur un prix.
     * La remise ne peut pas rendre le prix négatif.
     *
     * @throws \InvalidArgumentException si la remise est négative
     */
    public function appliquerRemise(float $prix, float $remisePourcentage): float
    {
        if ($remisePourcentage < 0  or $prix < 0) {
            throw new \InvalidArgumentException("La remise et le prix ne peuvent pas être négatifs.");
        }

        $prixApresRemise = $prix - ($prix * $remisePourcentage / 100);

        return max(0, round($prixApresRemise, 2));
    }

    /**
     * Vérifie si un prix respecte un seuil minimum.
     *
     * @throws \InvalidArgumentException si le seuil est négatif
     */
    public function respecteSeuilMinimum(float $prix, float $seuilMinimum): bool
    {
        if ($seuilMinimum < 0 or $prix < 0) {
            throw new \InvalidArgumentException("Le seuil minimum et le prix ne peuvent pas être négatifs.");
        }

        return $prix >= $seuilMinimum;
    }

}
