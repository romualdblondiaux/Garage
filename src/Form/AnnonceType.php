<?php

namespace App\Form;

use App\Entity\InfoSup;
use App\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AnnonceType extends AbstractType
{
    private function getConfiguration($label,$placeholder, $options=[]){
        return array_merge([
            'label'=>$label,
            'attr'=> [
                'placeholder'=>$placeholder
            ]
            ], $options);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque', TextType::class, $this->getConfiguration('marque :','Donnez la marque de la voiture'))
            ->add('modele', TextType::class, $this->getConfiguration('modele :','Donnez la modèle de la voiture'))
            ->add('img', UrlType::class, $this->getConfiguration('URL de l\'image :','Donnez l\'adresse de votre image'))
            ->add('km', TextType::class, $this->getConfiguration('Km :','Donnez les Km de la voiture'))
            ->add('prix', TextType::class, $this->getConfiguration('Prix :','Donnez le prix de la voiture'))
            ->add('proprio', IntegerType::class, $this->getConfiguration('Nombre de propriètaire :','Donnez le nombre de propriètaire'))
            ->add('cylindree', TextType::class, $this->getConfiguration('Cylindrée :','Donnez la cylindrée de la voiture'))
            ->add('puissance', TextType::class, $this->getConfiguration('Puissance :','Donnez la puissance de la voiture'))
            ->add('carburant', TextType::class, $this->getConfiguration('Carburant :','Donnez le type de carburant de la voiture'))
            ->add('annee', TextType::class, $this->getConfiguration('Année :','Donnez l\'année de mise en circulation de la voiture'))
            ->add('transmission', TextType::class, $this->getConfiguration('Transmission :','Donnez le type de transmission de la voiture'))
            ->add('description', TextareaType::class, $this->getConfiguration('Description :','Déscription détaillée de votre bien'))
            ->add('opt', TextareaType::class, $this->getConfiguration('Option :','Détail des option de la voiture'))
            ->add('images',  CollectionType::class,
            [
                'entry_type' => ImageType::class,
                'allow_add' => true, // permet d'ajouter de nouveaux éléments et ajouter un data_prototype
                'allow_delete' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InfoSup::class,
        ]);
    }
}
