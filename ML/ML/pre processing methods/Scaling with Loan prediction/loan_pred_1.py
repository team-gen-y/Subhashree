
import pandas as pd

X_train=pd.read_csv('X_train.csv')

Y_train=pd.read_csv('Y_train.csv')

X_test=pd.read_csv('X_test.csv')

Y_test=pd.read_csv('Y_test.csv')

print (X_train.head())

X_train[X_train.dtypes[(X_train.dtypes=="float64")|(X_train.dtypes=="int64")].index.values].hist(figsize=[11,11])

from sklearn.neighbors import KNeighborsClassifier

knn=KNeighborsClassifier(n_neighbors=5)

knn.fit(X_train[['ApplicantIncome', 'CoapplicantIncome','LoanAmount', 'Loan_Amount_Term', 'Credit_History']],Y_train)

from sklearn.metrics import accuracy_score

print(accuracy_score(Y_test,knn.predict(X_test[['ApplicantIncome', 'CoapplicantIncome','LoanAmount', 'Loan_Amount_Term', 'Credit_History']])))

#distribution of Loan_Status in train data set.

print(Y_train.Target.value_counts()/Y_train.Target.count())


print(Y_test.Target.value_counts()/Y_test.Target.count())

#sklearn provides a tool MinMaxScaler that will scale down all the features between 0 and 1. Mathematical formula for MinMaxScaler is.

from sklearn.preprocessing import MinMaxScaler

min_max=MinMaxScaler()

X_train_minmax=min_max.fit_transform(X_train[['ApplicantIncome', 'CoapplicantIncome', 'LoanAmount', 'Loan_Amount_Term', 'Credit_History']])

X_test_minmax=min_max.fit_transform(X_test[['ApplicantIncome', 'CoapplicantIncome','LoanAmount', 'Loan_Amount_Term', 'Credit_History']])

knn=KNeighborsClassifier(n_neighbors=5)

knn.fit(X_train_minmax,Y_train)

print(accuracy_score(Y_test,knn.predict(X_test_minmax)))

print('standardized')


from sklearn.preprocessing import scale

X_train_scale=scale(X_train[['ApplicantIncome', 'CoapplicantIncome','LoanAmount', 'Loan_Amount_Term', 'Credit_History']])

X_test_scale=scale(X_test[['ApplicantIncome', 'CoapplicantIncome','LoanAmount', 'Loan_Amount_Term', 'Credit_History']])

# Fitting logistic regression on our standardized data set

from sklearn.linear_model import LogisticRegression

log=LogisticRegression(penalty='l2',C=.01)

log.fit(X_train_scale,Y_train)
# Checking the model's accuracy

accuracy_score(Y_test,log.predict(X_test_scale))