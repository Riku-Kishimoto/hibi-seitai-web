import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save({ attributes }) {
    const { title, leadText, sections } = attributes;
    const blockProps = useBlockProps.save({ className: 'fee' });

    return (
        <section {...blockProps}>
            <div className="fee__inner">
                <div className="fee__title">
                    <span>{title}</span>
                </div>

                <div className="fee__content">
                    <p>{leadText}</p>
                </div>

                <div className="fee__list">
                    {sections.map((section) => (
                        <div className="fee__item" key={section.id}>
                            <div className="explanation explanation--fee">
                                <h4 className="explanation__title explanation__title--fee">
                                    {section.title}
                                </h4>
                            </div>

                            {section.rows.map((row) => (
                                <div className="fee__table fee__table--long" key={row.id}>
                                    <p>{row.left}</p>
                                    <p className="fee__price">{row.right}</p>
                                </div>
                            ))}
                        </div>
                    ))}
                </div>
            </div>
        </section>
    );
}