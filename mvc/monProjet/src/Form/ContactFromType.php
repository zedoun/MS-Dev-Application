<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class DemoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('objet')
            ->add('email')
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'required' => false
                ]
            )
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer le message'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Le formulaire n'est associé à aucune entité !!!
            // 'data_class' => Contact::class,
        ]);
    }
}
class ContactFromType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // Construction du formulaire...
        $builder
            ->add('objet')
            ->add('email')
            //On a rajouté un label et on a rendu le champ optionnel en
            // donnant la valeur false à l'attribut required
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'required' => false
                ]
            )
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer le message'])
 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
           // Options par défaut pour le formulaire 
            'data_class' => Contact::class,
        ]);
    }
}
