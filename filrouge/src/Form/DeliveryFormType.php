<?php 

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeliveryFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('pays', CountryType::class, [
                'label' => 'Pays',
            ])
            ->add('ville', TextType::class, [
                'label' => 'Ville',
            ])
             ->add('adresse', TextType::class, [
                'label' => 'Adresse',
            ])
            ->add('codepostal', IntegerType::class, [
                'label' => 'Code Postal',
                
            ]);
            
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Ajustez data_class à votre classe d'entité si nécessaire
            'data_class' => null,
        ]);
    }
}