<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;


class ArticleType extends AbstractType
{

/**
     * {@inheritdoc}
     *
     * @param FormBuilderInterface $builder The formBuilderInterface form
     * @param array                $options the attribute array
     *
     * @return void
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('picture', FileType::class, array(
                  'label' => false,
                  'required' => false,
                  'data_class' => null, 'attr' => array(
                  'accept' => '.jpg,.jpeg,.png')
            ))
            ->add('title', TextareaType::class, [
                'attr' => ['class' => 'tinymce'],
           ])
            ->add('creationDate', DateType::class, array(
                'widget' => 'single_text',
                'required' => false
            ))
            ->add('isPublish', CheckboxType::class, [
                'label'    => 'Publier la photo',
                'required' => false,
                'label_attr' => array('class' => 'pl-10')
            ])
            ->add('category')
            ->getForm();
    }
    /**
     * {@inheritdoc
     *
     * @param OptionsResolver $resolver The optionResolver class
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
            'data_class' => 'App\Entity\Article'
            )
        );
    }
    /**
     * {@inheritdoc}
     *
     * @return null
     */
    public function getBlockPrefix()
    {
        return 'app_article';
    }

}