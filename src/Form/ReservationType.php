<?php

namespace App\Form;

use App\Entity\Paiement;
use App\Entity\Reservation;
use App\Entity\Vehicule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReservationType extends AbstractType
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_reservation', null, [
                'widget' => 'single_text',
            ])
            ->add('lieu_depart')
            ->add('lieu_arrivee')
            ->add('heure_depart', null, [
                'widget' => 'single_text',
            ])
            ->add('heure_arrivee', null, [
                'widget' => 'single_text',
            ]);

        // ✅ Si l'utilisateur n'est pas connecté, afficher un champ pour entrer son nom
        if (!$this->security->getUser()) {
            $builder->add('nom', TextType::class, [
                'label' => 'Votre nom',
                'mapped' => false, // Ne lie pas ce champ à l'entité
                'required' => true
            ]);
        }

        $builder
            ->add('vehicule', EntityType::class, [
                'class' => Vehicule::class,
                'choice_label' => 'id',
            ])
            ->add('paiement', EntityType::class, [
                'class' => Paiement::class,
                'choice_label' => 'id',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Réserver',
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
