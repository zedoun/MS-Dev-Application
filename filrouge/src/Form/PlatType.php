<?php

namespace App\Form;

use App\Entity\Plat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class PlatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder->add('libelle')

        
            ->add('description')

        
            ->add('prix')

        
            ->add('active')

        
            ->add('categorie');

        
        if ($options['modifier_image'] ?? true) {
            $builder->add('image', FileType::class, [
                'label' => 'Image du plat',
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
       
        $resolver->setDefaults([
            'data_class' => Plat::class,
            'modifier_image' => true,
        ]);

        
        $resolver->setAllowedTypes('modifier_image', 'bool');
    }
}